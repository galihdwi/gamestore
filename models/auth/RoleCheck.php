<?php

namespace app\models\auth;

use Yii;

class RoleCheck
{
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
