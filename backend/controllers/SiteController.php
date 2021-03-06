<?php

namespace backend\controllers;

use common\models\LoginForm;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;

/**
 * Site controller
 */
class SiteController extends Controller
{

   /**
    * @inheritdoc
    */
   public function behaviors()
   {
      return [
         'verbs' => [
            'class' => VerbFilter::className(),
            'actions' => [
               'logout' => ['post'],
            ],
         ],
      ];
   }

   /**
    * @inheritdoc
    */
   public function actions()
   {
      return [
         'error' => [
            'class' => 'yii\web\ErrorAction',
         ],
      ];
   }

   public function actionIndex()
   {
      return $this->render('index');
   }

   public function actionLogin()
   {
      if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $this->layout = 'main-login';
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                        'model' => $model,
            ]);
        }
    }

   public function actionLogout()
   {
      Yii::$app->user->logout();

      return $this->goHome();
   }

}