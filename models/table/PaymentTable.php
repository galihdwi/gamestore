<?php

namespace app\models\table;

use Yii;

/**
 * This is the model class for table "payment".
 *
 * @property int $id
 * @property int|null $trx_id
 * @property string|null $status
 * @property string|null $amount
 * @property string|null $payment_method
 * @property int|null $created_at
 * @property int|null $updated_at
 *
 * @property Transaction $trx
 */
class PaymentTable extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'payment';
    }

    public function getTrx()
    {
        return $this->hasOne(Transaction::class, ['id' => 'trx_id']);
    }
}
