<?php

use app\models\Image;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ImageSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Изображения';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="image-index">

    <h1><?= Html::encode($this->title) ?></h1>

<!--    --><?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary' => "{count} записей из {totalCount}",
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                    'attribute' => 'status',
                    'content' => static function (Image $model) {
                        return $model->status === Image::STATUS_APPROVED ? 'Одобрено' : 'Отклонено';
                    },
                    'filter' => [Image::STATUS_APPROVED => 'Одобрено',Image::STATUS_REJECTED => 'Отклонено']
            ],
            [
                'class' => ActionColumn::className(),
                'template' => "{reset}",
                'headerOptions' => ['style' => 'width:20%'],
                'header' => 'Управление',
                'urlCreator' => function ($action, Image $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                },
                'buttons' => [
                    'reset' => function ($url, $model) {
                        return Html::a('Отмена решения', $url, [
                            'title' => Yii::t('app', 'Reset decision'),
                            'class' => 'btn btn-primary btn-sm'
                        ]);
                    },
                ],
            ],
        ],
    ]); ?>

</div>
