<?php

use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\LinkPager;

/** @var yii\web\View $this */
/** @var app\models\ProgramaSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Asignar Competencias';
$this->registerCssFile('@web/css/tablas.css', ['depends' => [yii\web\YiiAsset::class]]);
$this->registerCssFile('@web/css/botones.css', ['depends' => [yii\web\YiiAsset::class]]);
?>

<style>
    .header1 {
        height: 6vh;
        background: #39A900;
        color: white;
        text-align: center;
    }

    .paginador {
        color: white;
        width: 100%;
        display: flex;
        justify-content: center;
    }

    .paginador1 {
        color: white;
        width: 50px;
    }
    .buscar{
    width: 20%;
    }
</style>

<div class="programa-index">
    <br>

    <div class="text-center">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <hr class="divider">

    <div class="lista">
        <?= Html::a(
            Html::img('@web/img/icons/boton-agregar.png', ['class' => 'iconosa']) . ' Crear Asignación',
            ['create'],
            ['class' => 'listausu']
        ) ?>
        <?= Html::a(
            Html::img('@web/img/icons/controlar.png', ['class' => 'iconosa']) . ' Lista de Asignaciones',
            ['index'],
            ['class' => 'listaususelected', 'style' => 'pointer-events: none; cursor: default;']
        ) ?>
    </div>

    <div class="table-container">
        <div class="container2">
            <div class="buscar">
                <?php $form = ActiveForm::begin([
                    'action' => ['index'],
                    'method' => 'get',
                ]); ?>
                <?= $form->field($searchModel, 'id_pro_fk')
                    ->textInput(['placeholder' => 'Buscar por Código de Programa',
                    'style' => 'background:rgb(205, 205, 205); border-radius: 20px; height: 40px;
                    font-weight: bold;'
                    ])
                    ->label(false) ?>
                <?php ActiveForm::end(); ?>
            </div>
        </div>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'options' => ['class' => 'table table-striped'],
            'summary' => 'Mostrando {begin} - {end} de {totalCount} Programas.',
            'pager' => [
                'class' => LinkPager::class,
                'options' => ['class' => 'pagination paginador justify-content-center'], // Cambia las clases CSS
                'linkOptions' => ['class' => ' paginador1 ', 'style' => 'background: #39A900; margin: 2px; color:white'], // Cambia las clases de los enlaces
                'prevPageLabel' => '<<', // Etiqueta del botón "Anterior"
                'nextPageLabel' => '>>',    // Etiqueta del botón "Último"
                'maxButtonCount' => 5, // Número máximo de botones
            ],
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                [
                    'attribute' => 'id_pro_fk',
                    'label' => 'Código del Programa',
                    'enableSorting' => false,
                ],
                [
                    'attribute' => 'id_pro_fk',
                    'label' => 'Nombre del Programa',
                    'enableSorting' => false,
                    'value' => function ($model) {
                        return $model->programa ? $model->programa->nombre_programa : 'N/A';
                    },
                ],
                [
                    'attribute' => 'id_com_fk',
                    'label' => 'Competencia',
                    'enableSorting' => false,
                    'value' => function ($model) {
                        return $model->competencia ? $model->competencia->nombre : 'N/A';
                    },
                ],
            ],
            'headerRowOptions' => ['class' => 'header1'],
        ]); ?>
    </div>
</div>
