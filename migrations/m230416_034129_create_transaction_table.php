<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%transaction}}`.
 */
class m230416_034129_create_transaction_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%transaction}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'status' => $this->string(255),
            'amount' => $this->string(255),
            'type' => $this->string(255),
            'service' => $this->string(255),
            'data_no' => $this->string(255),
            'data_zone' => $this->string(255),
            'trxid' => $this->string(255),
            'phone' => $this->string(255),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%transaction}}');
    }
}
