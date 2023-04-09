<?php

namespace app\models\form;

use app\libs\helpers\CustomStringHelper;
use app\models\queue\ForgotPasswordNotificationOtpJob;
use app\models\table\ForgotPasswordTable;
use app\models\table\UserTable;
use Yii;
use yii\base\Model;

class ForgotPasswordForm extends Model
{

    public $mobileOrEmail;

    public function rules()
    {
        return [
            [['mobileOrEmail'], 'required', 'message' => '{attribute} harus diisi.'],
            [['mobileOrEmail'], 'validateMobileOrEmail'],
            ['mobileOrEmail', 'string', 'max' => 50, 'tooLong' => '{attribute} tidak boleh lebih dari {max} karakter.'],
            ['mobileOrEmail', 'match', 'pattern' => '/^(\+62|62|08[1-9][0-9]+)|([a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,})$/i', 'message' => '{attribute} tidak valid.']
        ];
    }

    public function validateMobileOrEmail($attribute, $params)
    {
        if (!$this->hasErrors()) {

            $query = UserTable::find()->where(['mobile' => $this->mobileOrEmail]);
            $query->orFilterWhere(['mobile' => preg_replace('/^(628|08|\+628)/i', '628', $this->mobileOrEmail)]);
            $query->orFilterWhere(['mobile' => preg_replace('/^(628|08|\+628)/i', '+628', $this->mobileOrEmail)]);
            $query->orFilterWhere(['mobile' => preg_replace('/^(628|\+628)/i', '08', $this->mobileOrEmail)]);

            $user = $query->orWhere(['email' => $this->mobileOrEmail])->one();

            if (!$user) {
                $this->addError($attribute, 'Nomor HP atau email tidak terdaftar.');
            } else {
                // check if user is disabled
                if ($user && $user->status == 'DISABLED') {
                    $this->addError('mobileOrEmail', 'Akun anda telah dinonaktifkan.');
                }
            }
        }
    }

    public function sendOtp()
    {
        if (!$this->hasErrors()) {

            $query = UserTable::find()->where(['mobile' => $this->mobileOrEmail]);
            $query->orFilterWhere(['mobile' => preg_replace('/^(628|08|\+628)/i', '628', $this->mobileOrEmail)]);
            $query->orFilterWhere(['mobile' => preg_replace('/^(628|08|\+628)/i', '+628', $this->mobileOrEmail)]);
            $query->orFilterWhere(['mobile' => preg_replace('/^(628|\+628)/i', '08', $this->mobileOrEmail)]);

            $user = $query->orWhere(['email' => $this->mobileOrEmail])->one();

            // save otp code to forgot_password table
            $forgotPassword = new ForgotPasswordTable();
            $forgotPassword->user_id = $user->id;
            $forgotPassword->otp_code = CustomStringHelper::generateOTP();

            if ($forgotPassword->save(false)) {

                /**
                 * match method data
                 */
                $methodData = preg_match('/^(628|08|\+628)[1-9][0-9]+$/i', $this->mobileOrEmail) ? 'whatsapp' : 'email';
                $methodDst = $this->mobileOrEmail;

                // push notification job
                Yii::$app->queue->push(new ForgotPasswordNotificationOtpJob([
                    'user' => $user->full_name,
                    'appName' => Yii::$app->name,
                    'otpCode' => $forgotPassword->otp_code,
                    'destination' => [
                        "{$methodData}:{$methodDst}"
                    ],
                ]));

                // set session
                Yii::$app->session->set('forgotUserId', $user->id);
                Yii::$app->session->set('forgotMethod', $methodData);
                Yii::$app->session->set('forgotDst', $methodDst);

                return $forgotPassword->getPrimaryKey();
            }
        }

        return false;
    }

    public function attributeLabels()
    {
        return [
            'mobileOrEmail' => 'Nomor HP atau Email',
        ];
    }
}
