<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%forgot_password}}`.
 */
class m230211_145238_create_forgot_password_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%forgot_password}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'otp_code' => $this->string(6),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            'idx-forgot_password-user_id',
            'forgot_password',
            'user_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            'fk-forgot_password-user_id',
            'forgot_password',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%forgot_password}}');
    }
}
