<?php

namespace app\models\table;

use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

class ForgotPasswordTable extends ActiveRecord
{
    public static function tableName()
    {
        return 'forgot_password';
    }

    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => TimestampBehavior::class,
                'value' => function () {
                    return date('Y-m-d H:i:s');
                }
            ],
        ];
    }

    public function getUser()
    {
        return $this->hasOne(UserTable::class, ['id' => 'user_id']);
    }
}
