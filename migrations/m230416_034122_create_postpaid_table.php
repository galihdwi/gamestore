<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%pospaid}}`.
 */
class m230416_034122_create_postpaid_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%postpaid}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255),
            'image' => $this->string(255),
            'status' => $this->string(255),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%postpaid}}');
    }
}
