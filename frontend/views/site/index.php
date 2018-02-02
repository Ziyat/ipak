<?php

$this->title = 'CMS Infosystems';
use domain\modules\menu\widgets\Navigations;
?>

<?= Navigations::widget([
    'tree' => 5,
]) ?>



