<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\entities\Reports */

$this->title = 'Create Reports';
$this->params['breadcrumbs'][] = ['label' => 'Reports', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="reports-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
