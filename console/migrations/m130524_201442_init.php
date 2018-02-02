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
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->insert('{{%users}}', [
            'username' => 'adm!n',
            'auth_key' => Yii::$app->security->generateRandomString(),
            'password_hash' => Yii::$app->security->generatePasswordHash('1q2w3e4r5t'),
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
