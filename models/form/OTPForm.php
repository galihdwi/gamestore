<?php

namespace app\models\form;

use app\models\table\ForgotPasswordTable;
use Yii;
use yii\base\Model;

class OTPForm extends Model
{
    public $otp;

    public $_registerId;
    public $_forgotId;

    public function rules()
    {
        return [
            // otp is required
            [['otp'], 'required', 'message' => 'Kode OTP harus diisi.'],
            ['otp', 'string', 'min' => 6, 'max' => 6, 'tooShort' => 'Kode OTP harus 6 digit.', 'tooLong' => 'Kode OTP harus 6 digit.'],
            ['otp', 'validateOtpForgot', 'on' => 'forgot-password'],
            ['otp', 'match', 'pattern' => '/^[0-9]+$/i', 'message' => 'Kode OTP hanya boleh mengandung angka.'],
        ];
    }

    public function validateOtpForgot($attribute, $params)
    {
        // get register model
        $forgot = ForgotPasswordTable::find()->where(['id' => $this->_forgotId])->orderBy(['id' => SORT_DESC])->one();

        // check if otp code is valid and not expired for 5 minutes
        if ($forgot->otp_code != $this->otp || $forgot->created_at < date('Y-m-d H:i:s', strtotime('-5 minutes'))) {
            $this->addError($attribute, 'Kode OTP tidak valid.');
        }
    }

    public function newPasswordSession()
    {
        if (!$this->hasErrors()) {
            // get forgot password model
            $forgot = ForgotPasswordTable::find()->where(['id' => $this->_forgotId])->orderBy(['id' => SORT_DESC])->one();

            // save to session
            Yii::$app->session->set('newPasswordSession', $forgot->user_id);

            return true;
        }

        return false;
    }

    public function attributeLabels()
    {
        return [
            'otp' => 'Kode OTP',
        ];
    }
}
