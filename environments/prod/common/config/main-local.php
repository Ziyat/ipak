<?php

return [
   'components' => [
      'db' => [
         'class' => 'yii\db\Connection',
         'dsn' => 'mysql:host=localhost;dbname=db',
         'username' => 'root',
         'password' => '',
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
