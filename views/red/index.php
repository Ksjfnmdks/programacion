<?php

use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\LinkPager;
use yii\grid\ActionColumn;
use app\models\Red;

/** @var yii\web\View $this */
/** @var app\models\RedSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Lista de Redes';
$this->registerCssFile('@web/css/tablas.css', ['depends' => [yii\web\YiiAsset::class]]);
?>

<style>
    .header1 {
        height: 6vh;
        background: #39A900;
        color: white;
        pointer-events: none;
        cursor: default;
    }

    .paginador {
        width: 100%;
        display: flex;
        justify-content: center;
        color: white;
    }

    .paginador1 {
        width: 50px;
        color: white;
    }
</style>

<div class="red-index">
    <br>
    <div class="text-center">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <hr class="divider">

    <div class="lista">
        <?= Html::a(
            Html::img('@web/img/icons/icon-crear.png', ['class' => 'iconosa']) . ' Crear Red',
            ['create'],
            ['class' => 'listausu']
        ) ?>
        <?= Html::a(
            Html::img('@web/img/icons/icon-lista-selecionada.png', ['class' => 'iconosa']) . ' Lista de Redes',
            ['index'],
            ['class' => 'listaususelected']
        ) ?>
    </div>

    <div class="table-container">
        <div class="container2">
            <div class="BuscarAmb">
                <?php $form = ActiveForm::begin([
                    'action' => ['index'],
                    'method' => 'get',
                ]); ?>
                <?= $form->field($searchModel, 'nombre_red')
                    ->textInput(['placeholder' => 'Buscar por nombre de red',
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
            'summary' => 'Mostrando {begin} - {end} de {totalCount} Redes.',
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
                    'attribute' => 'nombre_red',
                    'enableSorting' => false,
                ],
                
            ],
            'headerRowOptions' => ['class' => 'header1'],
        ]); ?>
    </div>
</div>
