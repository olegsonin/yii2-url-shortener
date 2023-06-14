<?php

use frontend\models\Link;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Links';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="link-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Link', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'url',
                'value' => function ($model) {
                    return Html::a(Html::encode($model->url), $model->url, ['target' => '_blank']);
                },
                'format' => 'raw',
            ],
            [
                'attribute' => 'hash',
                'value' => function ($model) {
                    $url = Url::toRoute(['links/redirect', 'hash' => $model->hash], true);
                    return Html::a($url, $url, ['target' => '_blank']);
                },
                'format' => 'raw',
            ],
            [
                'class' => ActionColumn::class,
                'template' => '{update} {delete}',
                'urlCreator' => function ($action, Link $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
