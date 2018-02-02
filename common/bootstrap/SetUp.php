<?php

namespace common\bootstrap;

use Yii;
use yii\base\BootstrapInterface;
use yii\base\ErrorHandler;
use backend\modules\contactform\ContactService;
use yii\mail\MailerInterface;


class SetUp implements BootstrapInterface
{
    public function bootstrap($app): void
    {
        $container = Yii::$container;

        $container->setSingleton(ErrorHandler::class, function () use ($app) {
            return $app->errorHandler;
        });

        $container->setSingleton(MailerInterface::class, function () use ($app) {
            return $app->mailer;
        });
    }
}