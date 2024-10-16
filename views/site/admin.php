<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\web\View;
use yii\helpers\Url;

$this->title = 'Instructores';
$this->registerCssFile('@web/css/tablas.css', ['depends' => [yii\web\YiiAsset::class]]);
?>

<style>
    .header1 {
        height: 6vh;
        text-decoration: none;
        background: #39A900;
        color: white;
        pointer-events: none;
        cursor: default;
    }
    .paginador {
        color: white;
        width: 60vw;
        display: flex;
        justify-content: center;
    }
    .paginador1 {
        color: white;
        width: 50px;
    }
</style>

<div class="Contabla">
    <div class="titulo">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <hr class="divider">


    <div class="table-container">
        <div class="BuscarUsu">
            <?php $form = ActiveForm::begin([
                'action' => ['admin'],
                'method' => 'get',
            ]); ?>

            <?= $form->field($searchModel, 'globalSearch')
                ->textInput(['placeholder' => 'Buscar'])->label(false) ?>

            <?php ActiveForm::end(); ?>
        </div>

        <?= GridView::widget([
    'dataProvider' => $dataProvider,
    'options' => ['class' => 'table table-striped'],
    'summary' => 'Mostrando {begin} - {end} de {totalCount} Instructores.',
    'pager' => [
        'options' => ['class' => 'pagination justify-content-center'],
        'linkOptions' => ['class' => 'page-link'],
        'pageCssClass' => 'page-item',
    ],
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        [
            'attribute' => 'identificacion',
            'enableSorting' => false,
        ],
        [
            'attribute' => 'nombre',
            'enableSorting' => false,
        ],
        [
            'attribute' => 'apellido',
            'enableSorting' => false,
        ],
        [
            'attribute' => 'correo',
            'enableSorting' => false,
        ],
        [
            'attribute' => 'telefono',
            'enableSorting' => false,
        ],
        [
            'attribute' => 'rol_id_FK',
            'value' => function ($model) {
                return $model->rol_id_FK == 2 ? 'Instructor' : 'Instructor Privilegiado';
            },
            'enableSorting' => false,
        ],
        [
            'attribute' => 'est_id_FK',
            'value' => 'estIdFK.descripcion',
            'enableSorting' => false,
        ],
        [
            'class' => 'yii\grid\ActionColumn',
            'header' => 'Acciones',
            'buttons' => [
                
            ],
        ],
    ],
    'headerRowOptions' => ['class' => 'header1'],
]); ?>
    </div>
</div>

