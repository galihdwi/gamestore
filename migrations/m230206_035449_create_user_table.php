<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user}}`.
 */
class m230206_035449_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'display_name' => $this->string(255),
            'username' => $this->string(255),
            'mobile' => $this->string(255),
            'email' => $this->string(255),
            'password' => $this->string(255),
            'auth_key' => $this->string(255),
            'access_token' => $this->string(255),
            'status' => $this->string(32),
            'role' => $this->string(255),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),
        ]);

        $this->insert('{{%user}}', [
            'display_name' => 'Admin',
            'username' => 'superadmin',
            'mobile' => '6285164393265',
            'email' => 'admin@dev.local',
            'password' => Yii::$app->security->generatePasswordHash('admin'),
            'auth_key' => Yii::$app->security->generateRandomString(32),
            'access_token' => Yii::$app->security->generateRandomString(32),
            'status' => 'ACTIVE',
            'role' => 'ADMIN',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        $this->insert('{{%user}}', [
            'display_name' => 'Demo Customer',
            'username' => 'demouser',
            'mobile' => '6285164393265',
            'email' => 'demo@dev.local',
            'password' => Yii::$app->security->generatePasswordHash('demo'),
            'auth_key' => Yii::$app->security->generateRandomString(32),
            'access_token' => Yii::$app->security->generateRandomString(32),
            'status' => 'ACTIVE',
            'role' => 'CUSTOMER',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user}}');
    }
}
