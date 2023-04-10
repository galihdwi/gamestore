<?php

namespace app\controllers;

use app\libs\helpers\CustomStringHelper;
use app\models\form\ForgotPasswordForm;
use app\models\form\LoginForm;
use app\models\form\NewPasswordForm;
use app\models\form\OTPForm;
use app\models\queue\ForgotPasswordNotificationOtpJob;
use app\models\table\ForgotPasswordTable;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\web\MethodNotAllowedHttpException;
use yii\web\NotFoundHttpException;

class SiteController extends Controller
{
    public $defaultAction = 'index';

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    // 'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        // pre-login
        $this->IsNotGuest();

        return $this->render('index');
    }

    public function actionGamePreview()
    {
        return $this->render('game-preview');
    }

    public function actionGames()
    {
        $this->layout = 'feature';
        return $this->render('games');
    }

    public function actionLogin()
    {
        // pre-login
        $this->IsNotGuest();

        // login form
        $model = new LoginForm();

        // post check
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            if (Yii::$app->user->identity->role == 'ADMIN') {
                return $this->redirect(['/admin/dashboard/index']);
            }

            if (Yii::$app->user->identity->role == 'SUPPORT') {
                return $this->redirect(['/support/dashboard/index']);
            }

            if (Yii::$app->user->identity->role == 'VENDOR') {
                return $this->redirect(['/vendor/dashboard/index']);
            }

            throw new \Exception('Invalid role');
        }

        // empty password
        $model->password = '';

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionForgotPassword()
    {
        // pre-login
        $this->isNotGuest();

        $session = Yii::$app->session;

        // remove existing forgot password session
        $session->remove('forgotUserId');
        $session->remove('forgotMethod');
        $session->remove('forgotDst');

        $model = new ForgotPasswordForm();

        // post check
        $post = Yii::$app->request->post();

        if ($model->load($post) && $model->validate()) {
            $requestId = $model->sendOtp();
            if ($requestId !== false) {
                return $this->redirect(['/site/otp-verification-forgot']);
            } else {
                $model->addError('mobile', 'Gagal mengirim kode OTP. Silakan coba lagi.');
            }
        }

        return $this->render('forgot-password', [
            'model' => $model,
        ]);
    }

    public function actionOtpVerificationForgot()
    {
        // pre-login
        $this->isNotGuest();

        $session = Yii::$app->session;

        if ($session->has('forgotMethod') && $session->has('forgotDst') && $session->has('forgotUserId')) {
            $model = ForgotPasswordTable::find()->where(['user_id' => $session->get('forgotUserId')])->orderBy(['id' => SORT_DESC])->one();
            $verificationMethod = $session->get('forgotMethod');
            $verificationDst = $session->get('forgotDst');

            $modelForm = new OTPForm();
            $modelForm->scenario = 'forgot-password';
            $modelForm->_forgotId = $model->id;

            if ($model) {
                if ($modelForm->load(Yii::$app->request->post()) && $modelForm->validate()) {
                    if ($modelForm->newPasswordSession()) {
                        // redirect to new password
                        return $this->redirect(['/site/new-password']);
                    } else {
                        // display error on form
                        $modelForm->addError('otp', 'Gagal memverifikasi kode OTP. Silakan coba lagi.');
                    }
                }

                return $this->render('otp-verification-forgot', [
                    'modelForm' => $modelForm,
                    'verificationMethod' => $verificationMethod == 'whatsapp' ? 'whatsapp' : 'e-mail',
                    'verificationDst' => $verificationDst
                ]);
            }

            throw new NotFoundHttpException('The requested page does not exist.');
        } else {
            return $this->redirect(['/site/forgot-password']);
        }
    }

    public function actionResendOtpVerificationForgot()
    {
        // pre-login
        $this->isNotGuest();

        $session = Yii::$app->session;

        $model = ForgotPasswordTable::find()->where(['user_id' => $session->get('forgotUserId')])->orderBy(['id' => SORT_DESC])->one();

        if (!$model) {
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        if ($this->request->isAjax && $this->request->isPost) {
            if ($session->has('forgotMethod') && $session->has('forgotDst') && $session->has('forgotUserId')) {
                $verificationMethod = $session->get('forgotMethod');
                $verificationDst = $session->get('forgotDst');

                // create new otp code if already more than 5 minutes
                if ($model->created_at < date('Y-m-d H:i:s', strtotime('-5 minutes'))) {
                    $newModel = new ForgotPasswordTable();
                    $newModel->user_id = $model->user_id;
                    // generate 6 digit otp code
                    $newModel->otp_code = CustomStringHelper::generateOTP();
                    // save to db
                    $newModel->save(false);

                    // replace old model with new model
                    $model = $newModel;
                }

                // push notification job
                Yii::$app->queue->push(new ForgotPasswordNotificationOtpJob([
                    'user' => $model->user->full_name,
                    'appName' => Yii::$app->name,
                    'otpCode' => $model->otp_code,
                    'destination' => [
                        "{$verificationMethod}:{$verificationDst}"
                    ],
                ]));

                /**
                 * return json
                 */
                return $this->asJson([
                    'success' => true,
                    'message' => 'kode OTP berhasil dikirim ulang.',
                ]);
            }
        } else {
            throw new MethodNotAllowedHttpException('Method not allowed.');
        }
    }

    public function actionNewPassword()
    {
        // pre-login
        $this->isNotGuest();

        $session = Yii::$app->session;

        if ($session->has('forgotMethod') && $session->has('forgotDst') && $session->has('forgotUserId')) {
            $modelForm = new NewPasswordForm();
            $modelForm->_userId = $session->get('forgotUserId');

            if ($modelForm->load(Yii::$app->request->post()) && $modelForm->validate()) {
                if ($modelForm->updatePassword()) {
                    // clear session
                    $session->remove('forgotUserId');
                    $session->remove('forgotMethod');
                    $session->remove('forgotDst');

                    // redirect to new password
                    return $this->redirect(['/site/login']);
                } else {
                    // display error on form
                    $modelForm->addError('otp', 'Gagal memverifikasi kode OTP. Silakan coba lagi.');
                }
            }

            return $this->render('new-password', [
                'modelForm' => $modelForm,
            ]);
        } else {
            return $this->redirect(['/site/forgot-password']);
        }
    }

    protected function isNotGuest()
    {
        if (!Yii::$app->user->isGuest) {
            if (Yii::$app->user->identity->role == 'ADMIN') {
                return $this->redirect(['/admin/default/index']);
            }

            if (Yii::$app->user->identity->role == 'SUPPORT') {
                return $this->redirect(['/support/default/index']);
            }

            if (Yii::$app->user->identity->role == 'VENDOR') {
                return $this->redirect(['/vendor/default/index']);
            }

            throw new \Exception('Invalid role');
        }
    }
}
