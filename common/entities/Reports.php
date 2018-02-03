<?php

namespace common\entities;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "reports".
 *
 * @property int $id
 * @property int $mfo_client
 * @property int $mfo_correspondent
 * @property string $name_client
 * @property string $name_correspondent
 * @property int $account_correspondent
 * @property int $account_client
 * @property int $document_amount
 * @property string $purpose_of_payment
 * @property int $executor
 * @property int $date_message
 * @property string $criterion
 */
class Reports extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'reports';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mfo_client', 'mfo_correspondent', 'account_correspondent', 'account_client', 'document_amount', 'executor', 'date_message'], 'integer'],
            [['name_client', 'name_correspondent', 'purpose_of_payment', 'criterion'], 'string', 'max' => 255],
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'created_by',
                'updatedByAttribute' => 'updated_by',
            ],
            'timestamp' => [
                'class' => 'yii\behaviors\TimestampBehavior',
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
            ],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'mfo_client' => 'МФО Клиента',
            'mfo_correspondent' => 'Mfo Correspondent',
            'name_client' => 'Name Client',
            'name_correspondent' => 'Name Correspondent',
            'account_correspondent' => 'Account Correspondent',
            'account_client' => 'Account Client',
            'document_amount' => 'Document Amount',
            'purpose_of_payment' => 'Purpose Of Payment',
            'executor' => 'Executor',
            'date_message' => 'Date message',
            'criterion' => 'Criterion',
        ];
    }
}
