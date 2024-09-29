<?php

use app\models\TblFichas;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\FichaSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Tbl Fichas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-fichas-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Tbl Fichas', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'fic_id',
            'codigo',
            'fecha_incio',
            'fecha_final',
            'pro_id_FK',
            //'instructor_lider',
            //'jor_id_FK',
            //'fecha_creacion',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, TblFichas $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'fic_id' => $model->fic_id]);
                 }
            ],
        ],
    ]); ?>


</div>
