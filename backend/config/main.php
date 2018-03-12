<?php

$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'name' => 'Bank report system',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'modules' => [
        'menu' => [
            'class' => 'domain\modules\menu\Module',
            'defaultRoute' => 'menu',
        ],
        'text' => [
            'class' => 'domain\modules\text\Module',
            'defaultRoute' => 'category',
        ],
        'contactform' => [
            'class' => 'backend\modules\contactform\Module',
        ],
        'contact' => [
            'class' => 'domain\modules\contact\Module',
            'defaultRoute' => 'contact',
        ],
        'slider' => [
            'class' => 'domain\modules\slider\Module',
        ]
    ],
    'components' => [

        'user' => [
            'identityClass' => 'backend\entities\User',
            'enableAutoLogin' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
    ],
    'as access' => [
        'class' => 'yii\filters\AccessControl',
        'except' => ['site/login', 'site/error'],
        'rules' => [
            [
                'allow' => true,
                'roles' => ['@'],
            ],
        ],
    ],
    'params' => $params,
];
