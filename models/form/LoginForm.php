<?php

namespace app\models\form;

use app\models\auth\WebIdentity;
use Yii;
use yii\base\Model;

class LoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe = true;

    private $_user = false;


    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password'], 'required', 'message' => '{attribute} harus diisi.'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean', 'message' => '{attribute} tidak valid.'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'username' => 'Nama Pengguna',
            'password' => 'Kata Sandi',
            'rememberMe' => 'Ingat saya',
        ];
    }

    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();

            if (!$user || !Yii::$app->security->validatePassword($this->password, $user->password)) {
                $this->addError($attribute, 'Nama pengguna atau kata sandi tidak valid.');
            }

            if ($user && $user->status == 'DISABLED') {
                $this->addError('username', 'Akun anda telah dinonaktifkan.');
            }
        }
    }


    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        }
        return false;
    }

    protected function getUser()
    {
        if ($this->_user === false) {
            $this->_user = WebIdentity::findOne(['username' => $this->username]);
        }

        return $this->_user;
    }
}
