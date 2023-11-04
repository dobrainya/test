<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class ApiController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
//            'access' => [
//                'class' => AccessControl::className(),
//                'only' => ['logout'],
//                'rules' => [
//                    [
//                        'actions' => ['logout'],
//                        'allow' => true,
//                        'roles' => ['@'],
//                    ],
//                ],
//            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'reject' => ['post'],
                    'approve' => ['post'],
                    'img' => ['get'],
                ],
            ],
        ];
    }

    public function actionImg()
    {
        return $this->asJson([
            'imgId'=> 1020,
            'imgSrc' => 'https://picsum.photos/id/1020/600/500',
        ]);
    }

    public function actionApprove()
    {
        return $this->asJson('2');
    }

    public function actionReject()
    {
        return $this->asJson('3');
    }
}
