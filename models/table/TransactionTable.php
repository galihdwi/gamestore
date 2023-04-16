<?php

namespace app\models\table;

use Yii;

/**
 * This is the model class for table "transaction".
 *
 * @property int $id
 * @property int|null $user_id
 * @property string|null $status
 * @property string|null $amount
 * @property string|null $type
 * @property string|null $service
 * @property string|null $data_no
 * @property string|null $data_zone
 * @property string|null $trxid
 * @property string|null $phone
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property Payment[] $payments
 */
class TransactionTable extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'transaction';
    }

    public function getPayments()
    {
        return $this->hasMany(Payment::class, ['trx_id' => 'id']);
    }
}
