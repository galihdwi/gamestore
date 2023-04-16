<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%payment}}`.
 */
class m230416_034144_create_payment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%payment}}', [
            'id' => $this->primaryKey(),
            'trx_id' => $this->integer(),
            'status' => $this->string(255),
            'amount' => $this->string(255),
            'payment_method' => $this->string(255),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),
        ]);

        $this->createIndex(
            'idx-payment-trx_id',
            'payment',
            'trx_id'
        );

        $this->addForeignKey(
            'fk-payment-trx_id',
            'payment',
            'trx_id',
            'transaction',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%payment}}');
    }
}
