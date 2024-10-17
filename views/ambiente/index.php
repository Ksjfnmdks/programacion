<?php

use app\models\Ambiente;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\widgets\LinkPager;

/** @var yii\web\View $this */
/** @var app\models\AmbienteSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Lista de Ambientes';
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
        justify-self: center;
        justify-content: center;
    }

    .paginador1 {
        color: white;
        width: 50px;
    }
</style>

<div class="ambiente-index">
    <br>

    <div class="text-center">
        <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <hr class="divider">

    <div class="lista">
        <?= Html::a(
            Html::img('@web/img/icons/icon-crear.png', ['class' => 'iconosa']) . ' Crear Ambiente',
            ['ambiente/create'],
            ['class' => 'listausu']
        ) ?>
        <?= Html::a(
            Html::img('@web/img/icons/icon-lista-selecionada.png', ['class' => 'iconosa']) . ' Lista de Ambientes',
            ['ambiente/index'],
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
                <?= $form->field($searchModel, 'globalSearch')
                    ->textInput(['placeholder' => 'Buscar',
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
            'summary' => 'Mostrando {begin} - {end} de {totalCount} Ambientes.',
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
                    'attribute' => 'nombre_ambiente',
                    'enableSorting' => false,
                ],
                [
                    'attribute' => 'capacidad',
                    'enableSorting' => false,
                ],
                [
                    'attribute' => 'estado',
                    'enableSorting' => false,
                ],
                [
                    'attribute' => 'recursos',
                    'format' => 'ntext',
                    'enableSorting' => false,
                ],
                [
                    'attribute' => 'nombre_red',
                    'label' => 'Nombre de Red',
                    'enableSorting' => false,
                    'value' => function ($model) {
                        return $model->redes ? $model->redes->nombre_red : 'Sin red';
                    },
                ],
                [
                    'attribute' => 'fecha_creacion',
                    'enableSorting' => false,
                ],
                [
                    'class' => ActionColumn::class,
                    'header' => 'Acciones',
                    'template' => '{update} {delete}',
                    'buttons' => [
                        'update' => function ($url, $model) {
                            return Html::a(
                                '<i class="bi bi-pencil-fill" style="color: #38A800; font-size: 1.2rem;"></i>',
                                $url,
                                ['title' => 'Actualizar']
                            );
                        },
                        'delete' => function ($url, $model) {
                            return Html::a(
                                '<i class="bi bi-trash-fill" style="color: #38A800; font-size: 1.2rem;"></i>',
                                $url,
                                [
                                    'title' => 'Eliminar',
                                    'data-confirm' => '¿Está seguro de que desea eliminar este ambiente?',
                                    'data-method' => 'post',
                                ]
                            );
                        },
                    ],
                    'urlCreator' => function ($action, Ambiente $model, $key, $index, $column) {
                        return Url::toRoute([$action, 'amb_id' => $model->amb_id]);
                    },
                ],
            ],
            'headerRowOptions' => ['class' => 'header1'],
        ]); ?>
    </div>
</div>
