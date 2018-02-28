<?php

use yii\db\Migration;

class m130524_201442_init extends Migration
{

    public function up()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';

        $this->createTable('{{%users}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'name' => $this->string()->notNull(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->insert('{{%users}}', [
            'username' => 'admin',
            'name' => 'Администратор',
            'auth_key' => Yii::$app->security->generateRandomString(),
            'password_hash' => Yii::$app->security->generatePasswordHash('1q2w3e4r5t'),
            'created_at' => time(),
            'updated_at' => time(),
        ]);
        $this->insert('{{%users}}', [
            'username' => 'user1',
            'name' => 'Филиал 1',
            'auth_key' => Yii::$app->security->generateRandomString(),
            'password_hash' => Yii::$app->security->generatePasswordHash('1z2x3c4v5b'),
            'created_at' => time(),
            'updated_at' => time(),
        ]);
        $this->insert('{{%users}}', [
            'username' => 'user2',
            'name' => 'Филиал 2',
            'auth_key' => Yii::$app->security->generateRandomString(),
            'password_hash' => Yii::$app->security->generatePasswordHash('1a2s3d4f5g'),
            'created_at' => time(),
            'updated_at' => time(),
        ]);

        $this->createIndex('{{%idx-user-status}}', '{{%users}}', 'status');
    }

    public function down()
    {
        $this->dropTable('{{%users}}');
    }

}
