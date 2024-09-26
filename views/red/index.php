<?php

use app\models\Red;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\RedSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Redes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="red-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Red', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'red_id',
            'nombre_red',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Red $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'red_id' => $model->red_id]);
                 }
            ],
        ],
    ]); ?>


</div>
