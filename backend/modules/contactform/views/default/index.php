<div class="contactform-default-index">


    <h1><a href="http://backend.shop.dev/contactform/contact"><?= Yii::t('app', 'Contact Form') ?></a></h1>
</div>

<pre>
Добавить в common\bootstrap\SetUp.php
--------------------------------------
use backend\modules\contactform\ContactService;
use yii\mail\MailerInterface;

class SetUp implements BootstrapInterface
{
    public function bootstrap($app): void
    {
        $container = \Yii::$container;

        $container->setSingleton(MailerInterface::class, function () use ($app) {
            return $app->mailer;
        });
        $container->setSingleton(ContactService::class, [], [
            $app->params['adminEmail']
        ]);


</pre>