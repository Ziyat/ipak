<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\entities\ReportsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Reports';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reports-index">
<!--    --><?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Reports', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'options'=>['style'=>'white-space: normal;'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'mfo_client',
            'name_client',
            'mfo_correspondent',
            'name_correspondent',
//            'account_correspondent',
//            'account_client',
//            'document_amount',
//            'purpose_of_payment',
//            'executor',
            'date_message:date',
            [
                'attribute' => 'created_at',
                'value' => 'created_at',
                'format' => 'date',
                'filter' => \kartik\daterange\DateRangePicker::widget([
                    'model' => $searchModel,
                    'attribute'=>'created_at',
                    'convertFormat'=>true,
                    'pluginOptions'=>[
                        'locale'=>[
                            'format'=>'Y-m-d',
                            'separator' => 'to',
                        ]
                    ]
                ])
            ],
            [
                    'attribute' => 'created_by',
                    'label' => 'Добавил',
                    'value' => function($model){
                        return (\backend\entities\User::findOne($model->created_by))->name;
                    }
            ],
//            'criterion',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
