<?php

namespace app\models\table;

use Yii;

/**
 * This is the model class for table "postpaid".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $image
 * @property string|null $status
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class PostpaidTable extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'postpaid';
    }
}
