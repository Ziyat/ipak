<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model common\entities\Reports */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="reports-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'file')->label('Загрузить файл Excel')->widget(FileInput::classname(), [
        'name' => 'file',
    ]); ?>


<?php $form->field($model, 'mfo_client')->textInput() ?>

<?php $form->field($model, 'mfo_correspondent')->textInput() ?>

<?php $form->field($model, 'name_client')->textInput(['maxlength' => true]) ?>

<?php $form->field($model, 'name_correspondent')->textInput(['maxlength' => true]) ?>

<?php $form->field($model, 'account_correspondent')->textInput() ?>

<?php $form->field($model, 'account_client')->textInput() ?>

<?php $form->field($model, 'document_amount')->textInput() ?>

<?php $form->field($model, 'purpose_of_payment')->textInput(['maxlength' => true]) ?>

<?php $form->field($model, 'executor')->textInput() ?>

<?php $form->field($model, 'date_message')->textInput() ?>

<?php $form->field($model, 'criterion')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
