<?php

namespace app\models\auth;

use Yii;
use app\models\table\UserTable;
use yii\web\IdentityInterface;

class WebIdentity extends UserTable implements IdentityInterface
{
    public static function findIdentity($id)
    {
        return self::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return self::findOne(['access_token' => $token]);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return $this->auth_key;
    }

    public function validateAuthKey($authKey)
    {
        return $this->auth_key == $authKey;
    }

    public static function findByUsername($username)
    {
        $model = self::find()->where(['username' => $username]);

        return $model;
    }

    /**
     * roles check
     */
    public static function isRoles($roles)
    {
        $user = Yii::$app->user;

        if ($user->isGuest) {
            return false;
        } else {
            if (in_array($user->identity->role, $roles)) {
                return true;
            }
        }

        return false;
    }
}
