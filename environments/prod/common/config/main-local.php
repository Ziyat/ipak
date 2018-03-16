<?php

return [
   'components' => [
      'db' => [
         'class' => 'yii\db\Connection',
         'dsn' => 'mysql:host=localhost;dbname=bank',
         'username' => 'root',
         'password' => '1z2x3c4v5b@#',
         'charset' => 'utf8',
          'attributes' => [
              PDO::MYSQL_ATTR_INIT_COMMAND => "SET sql_mode=(SELECT REPLACE(@@sql_mode,'ONLY_FULL_GROUP_BY',''));",
          ],
      ],
      'mailer' => [
         'class' => 'yii\swiftmailer\Mailer',
         'viewPath' => '@common/mail',
         'useFileTransport' => false,
//         'transport' => [
//
//         ],
      ],
   ],
];
