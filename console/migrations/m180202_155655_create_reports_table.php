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
            'mfo_client' => $this->string(),
            'mfo_correspondent' => $this->string(),
            'name_client' => $this->string(),
            'name_correspondent' => $this->string(),
            'account_correspondent' => $this->string(),
            'account_client' => $this->string(),
            'document_amount' => $this->integer(),
            'purpose_of_payment' => $this->string(),
            'posting_date' => $this->integer(),
            'identifier' => $this->string(),
            'executor' => $this->string(),
            'date_message' => $this->integer(),
            'criterion' => $this->float(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'created_by' => $this->integer()->notNull(),
            'updated_by' => $this->integer()->notNull(),
        ],$tableOptions);

        $this->addForeignKey('{{%fk-reports_created_by}}', '{{%reports}}', 'created_by', '{{%users}}', 'id', 'RESTRICT', 'RESTRICT');
        $this->addForeignKey('{{%fk-reports_updated_by}}', '{{%reports}}', 'updated_by', '{{%users}}', 'id', 'RESTRICT', 'RESTRICT');

    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%reports}}');
    }
}
