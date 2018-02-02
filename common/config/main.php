<?php


return [
// configuration adjustments for 'dev' environment
   'aliases' => [
      '@bower' => '@vendor/bower-asset',
      '@npm' => '@vendor/npm-asset',
      '@webfolder' => realpath('./../../frontend/web'),
   ],
   'language' => 'ru',
   'sourceLanguage' => 'ru',
   'timeZone' => 'Asia/Tashkent',
   'bootstrap' => ['log'],
   'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
   'modules' => [
      'debug' => [
         'class' => 'yii\debug\Module'
      ],
      'gii' => [
         'class' => 'yii\gii\Module'
      ],
   ],
   'components' => [
      'assetManager' => [
         'bundles' => [
            'yii\web\JqueryAsset' => [
               'jsOptions' => ['position' => \yii\web\View::POS_HEAD]
            ]
         ]
      ],
      'i18n' => [
         'translations' => [
            'app' => [
               'class' => 'yii\i18n\PhpMessageSource',
               'basePath' => '@common/messages',
               'sourceLanguage' => 'en',
               'fileMap' => [
                  'app' => 'app.php',
                  'app/error' => 'error.php',
               ],
            ],
         ]
      ],
      'formatter' => [
         'class' => 'yii\i18n\Formatter',
         // 'dateFormat' => 'd MMMM yyyy',
         'dateFormat' => 'long',
         'locale' => 'ru'
      ],
   ],
];
