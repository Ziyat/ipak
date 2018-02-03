<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\entities\ReportsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reports-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'mfo_client') ?>

    <?= $form->field($model, 'mfo_correspondent') ?>

    <?= $form->field($model, 'name_client') ?>

    <?= $form->field($model, 'name_correspondent') ?>

    <?php // echo $form->field($model, 'account_correspondent') ?>

    <?php // echo $form->field($model, 'account_client') ?>

    <?php // echo $form->field($model, 'document_amount') ?>

    <?php // echo $form->field($model, 'purpose_of_payment') ?>

    <?php // echo $form->field($model, 'executor') ?>

    <?php // echo $form->field($model, 'date_message') ?>

    <?php // echo $form->field($model, 'criterion') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
