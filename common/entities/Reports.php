<?php

namespace common\entities;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\db\ActiveRecord;
use yii\helpers\VarDumper;
use moonland\phpexcel\Excel;

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
 * @property int created_at
 * @property int updated_at
 * @property int created_by
 * @property int updated_by
 * @property int $date_message
 * @property string $criterion
 * @property string $file
 * @property string $posting_date
 * @property string $identifier
 */
class Reports extends \yii\db\ActiveRecord
{

    public $file;

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
            [['file'], 'file', 'checkExtensionByMimeType' => false, 'skipOnEmpty' => true, 'extensions' => 'xls, xlsx', 'mimeTypes' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel', 'maxFiles' => 1, 'maxSize' => 200 * 1024 * 1024],
        ];
    }

    public function uploadFile($id, $created_at)
    {
        $path = Yii::getAlias('@frontend/web/upload/');
        $url = 'upload/';
        $filename = $id . $created_at . '.' . $this->file->extension;
        if ($this->file->saveAs($path . $filename)) {

            $data = Excel::widget([
                'mode' => 'import',
                'fileName' => [
                    'file1' => $path . $filename,
                ],
                'setFirstRecordAsKeys' => false,
                'setIndexSheetByName' => false,
                'getOnlySheet' => 'sheet1',
            ]);

            $arr=[
            ];
            $i=0;
            foreach ($data['file1'] as $rKey =>  $items){
                foreach ($items as $key => $item)
                {
                    switch ($key){
                        case 'A':
                            break;
                        case 'B':
                            $arr[$i]['mfo_client'] = $item;
                            break;
                        case 'C':
                            $arr[$i]['account_client'] = $item;
                            break;
                        case 'D':
                            $arr[$i]['name_client'] = $item;
                            break;
                        case 'E':
                            $arr[$i]['mfo_correspondent'] = $item;
                            break;
                        case 'F':
                            $arr[$i]['account_correspondent'] = $item;
                            break;
                        case 'G':
                            $arr[$i]['name_correspondent']= $item;
                            break;
                        case 'H':
                            $arr[$i]['document_amount'] = trim($item);
                            break;
                        case 'I':
                            $arr[$i]['purpose_of_payment'] = $item;
                            break;
                        case 'J':
                            $arr[$i]['posting_date'] = strtotime($item);
                            break;
                        case 'K':
                            $arr[$i]['identifier'] = $item;
                            break;
                        case 'L':
                            $arr[$i]['executor'] = $item;
                            break;
                        case 'M':

                            if($item != 'Дата сообщения' && $item != null){
                                $get_array = explode('-', $item);
                              $date = $get_array[1].'-'. $get_array[0].'-20'.$get_array[2];
                              $arr[$i]['date_message'] = strtotime($date);
                            }else{
                                $arr[$i]['date_message'] = $item;
                            }

                            break;
                        case 'N':
                            $arr[$i]['criterion'] = $item;
                            break;
                    }
                }
                $i++;

            }
            array_splice($arr, 0,3);
            foreach ($arr as $key => $item){
                if($key == 0){
                    $thisModel = self::find()->where(['id' => $id])->one();
                    $thisModel->mfo_client = $item['mfo_client'];
                    $thisModel->account_correspondent = $item['account_correspondent'];
                    $thisModel->name_correspondent = $item['name_correspondent'];
                    $thisModel->document_amount = $item['document_amount'];
                    $thisModel->purpose_of_payment = $item['purpose_of_payment'];
                    $thisModel->posting_date = $item['posting_date'];
                    $thisModel->identifier = $item['identifier'];
                    $thisModel->executor = $item['executor'];
                    $thisModel->date_message = $item['date_message'];
                    $thisModel->criterion = $item['criterion'];
                    VarDumper::dump($thisModel,100,true);die;
                    $thisModel->save();
                }

//                $model = new Reports();
//                $model->mfo_client = $item['mfo_client'];
//                $model->account_correspondent = $item['account_correspondent'];
//                $model->name_correspondent = $item['name_correspondent'];
//                $model->document_amount = $item['document_amount'];
//                $model->purpose_of_payment = $item['purpose_of_payment'];
//                $model->posting_date = $item['posting_date'];
//                $model->identifier = $item['identifier'];
//                $model->executor = $item['executor'];
//                $model->date_message = $item['date_message'];
//                $model->criterion = $item['criterion'];
//                $model->save();

            }

            return true;
        }
        return false;
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
            'identifier' => 'identifier',
            'posting_date' => 'posting_date',
        ];
    }
}
