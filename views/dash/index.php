<?php

use app\models\Image;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ImageSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Images');
$this->params['breadcrumbs'][] = $this->title;

$photoService = Yii::$app->photoService;
?>
<div class="image-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary' => Yii::t('app', '{count} records of {totalCount}'),
        'columns' => [
            [
                    'attribute' => 'id',
                    'content' => static function (Image $model) use ($photoService){
                        return Html::a($model->id, $photoService->composeImageUrl("/id/{$model->id}"), [
                            'title' => Yii::t('app', 'View image'),
                            'target' => '_blank',
                        ]);
                    },
            ],
            [
                    'attribute' => 'status',
                    'content' => static function (Image $model) {
                        return Yii::t('app', $model->status === Image::STATUS_APPROVED ? 'Approved' : 'Rejected');
                    },
                    'filter' => [Image::STATUS_APPROVED => Yii::t('app','Approved'),Image::STATUS_REJECTED => Yii::t('app','Rejected')]
            ],
            [
                'class' => ActionColumn::className(),
                'template' => "{reset}",
                'headerOptions' => ['style' => 'width:20%'],
                'header' => Yii::t('app','Manage'),
                'urlCreator' => function ($action, Image $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id, 't' => Yii::$app->params['dashToken']]);
                },
                'buttons' => [
                    'reset' => function ($url, $model) {
                        return Html::a(Yii::t('app', 'Reset decision'), $url, [
                            'title' => Yii::t('app', 'Reset decision'),
                            'class' => 'btn btn-primary btn-sm'
                        ]);
                    },
                ],
            ],
        ],
    ]); ?>
</div>
