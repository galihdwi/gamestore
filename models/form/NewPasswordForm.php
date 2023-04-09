<?php

namespace app\models\form;

use app\models\queue\ForgotPasswordSuccessNotificationJob;
use app\models\table\UserTable;
use Yii;
use yii\base\Model;

class NewPasswordForm extends Model
{
    public $password;
    public $confirm_password;

    public $_userId;

    public function rules()
    {
        return [
            [['password', 'confirm_password'], 'required', 'message' => '{attribute} harus diisi.'],
            ['password', 'string', 'min' => 8, 'tooShort' => '{attribute} minimal 8 karakter.'],
            ['confirm_password', 'compare', 'compareAttribute' => 'password', 'message' => 'Konfirmasi kata sandi tidak sama.'],
        ];
    }

    public function updatePassword()
    {
        if (!$this->hasErrors()) {
            $user = UserTable::findOne($this->_userId);
            $user->password = Yii::$app->security->generatePasswordHash($this->password);
            $user->save(false);

            // session
            $methodData = Yii::$app->session->get('forgotMethod');
            $methodDst = Yii::$app->session->get('forgotDst');

            // push notification job
            Yii::$app->queue->push(new ForgotPasswordSuccessNotificationJob([
                'user' => $user->full_name,
                'appName' => Yii::$app->name,
                'destination' => [
                    "{$methodData}:{$methodDst}"
                ],
            ]));

            return true;
        }

        return false;
    }

    public function attributeLabels()
    {
        return [
            'password' => 'Kata Sandi',
            'confirm_password' => 'Konfirmasi Kata Sandi'
        ];
    }
}
