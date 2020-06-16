<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use app\models\SiteForm;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        $this->createAction('captcha')->getVerifyCode(true);

        $form = new SiteForm();

        return $this->render('index', ['form' => $form]);
    }

    public function actionGetImage()
    {
        $form_model = new SiteForm();

        if(\Yii::$app->request->isAjax && \Yii::$app->request->post()){
            if($form_model->load(\Yii::$app->request->post()) && $form_model->validate()){
                
                $gif = \Yii::$app->giphy->getGif();

                return $gif;
            }
        }
        
        throw new \yii\web\NotFoundHttpException();
    }
}