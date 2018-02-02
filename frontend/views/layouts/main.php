<?php

use frontend\assets\AppAsset;
use yii\helpers\Html;

AppAsset::register($this);

?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title><?= Html::encode($this->title) ?> | RTS Group</title>
      <?php $this->head() ?>
      <?= Html::csrfMetaTags() ?>
   </head>

   <body >
      <?php $this->beginBody() ?>

         <?= $content ?>

      <?php $this->endBody() ?>
   </body></html>
<?php $this->endPage() ?>
