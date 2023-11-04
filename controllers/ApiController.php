<?php

namespace app\controllers;

use app\components\PhotoService;
use app\models\Image;
use Yii;
use yii\filters\VerbFilter;

class ApiController extends AbstractController
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
        try {
            return $this->asJson($this->getPhotoService()->fetch());
        } catch (\Exception $e) {
            Yii::error($e->getMessage());

            throw $e;
        }
    }

    public function actionApprove()
    {
        try {
            $id = Yii::$app->request->get('id');

            $this->saveImage((int) $id, Image::STATUS_APPROVED);

            return $this->asJson($this->getPhotoService()->fetch());
        } catch (\Exception $e) {
            Yii::error($e->getMessage());

            throw $e;
        }
    }

    public function actionReject()
    {
        try {
            $id = Yii::$app->request->get('id');

            $this->saveImage((int) $id, Image::STATUS_REJECTED);

            return $this->asJson($this->getPhotoService()->fetch());
        } catch (\Exception $e) {
            Yii::error($e->getMessage());

            throw $e;
        }
    }

    private function saveImage(int $id, int $status)
    {
        $image = new Image();
        $image->id = $id;
        $image->status = $status;
        $image->save();
    }

    private function getPhotoService(): PhotoService
    {
        return Yii::$app->photoService;
    }
}
