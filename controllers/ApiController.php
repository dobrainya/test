<?php

namespace app\controllers;

use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;

class ApiController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
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
        $id = Yii::$app->request->get('id');

        $service = Yii::$app->photoService;

        return $this->asJson('2');
    }

    public function actionReject()
    {
        $id = Yii::$app->request->get('id');

        return $this->asJson('3');
    }
}
