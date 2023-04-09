<?php

namespace app\models\table;

use yii\behaviors\TimestampBehavior;

class UserTable extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'user';
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'value' => function () {
                    return date('Y-m-d H:i:s');
                }
            ]
        ];
    }
}
