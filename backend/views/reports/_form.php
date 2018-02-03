<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\entities\Reports */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reports-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'mfo_client')->textInput() ?>

    <?= $form->field($model, 'mfo_correspondent')->textInput() ?>

    <?= $form->field($model, 'name_client')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name_correspondent')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'account_correspondent')->textInput() ?>

    <?= $form->field($model, 'account_client')->textInput() ?>

    <?= $form->field($model, 'document_amount')->textInput() ?>

    <?= $form->field($model, 'purpose_of_payment')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'executor')->textInput() ?>

    <?= $form->field($model, 'date_message')->textInput() ?>

    <?= $form->field($model, 'criterion')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
