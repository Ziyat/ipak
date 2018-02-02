<?php

use yii\db\Migration;

/**
 * Handles the creation of table `reports`.
 */
class m180202_155655_create_reports_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        $this->createTable('{{%reports}}', [
            'id' => $this->primaryKey(),
            'mfo_client' => $this->integer(),
            'mfo_correspondent' => $this->integer(),
            'name_client' => $this->string(),
            'name_correspondent' => $this->string(),
        ],$tableOptions);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%reports}}');
    }
}
