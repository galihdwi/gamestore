<?php

namespace app\models\table;

use Yii;

/**
 * This is the model class for table "games".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $image
 * @property string|null $status
 * @property string|null $created_at
 * @property string|null $updated_at
 */
class GamesTable extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'games';
    }
}
