<?php

use app\models\Programa;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\widgets\LinkPager;

/** @var yii\web\View $this */
/** @var app\models\ProgramaSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Lista de Programas';
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

    .paginador{
        color: white;
        width: 100%;
        display: flex;
        justify-self: center;
        justify-content: center;
    }
    .paginador1{
        
        color: white;
        width: 50px;
    }

    .iconosa {
        width: 30px;
        margin-right: 5px;
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
            Html::img('@web/img/icons/icon-crear.png', ['class' => 'iconosa']) . ' Crear Programa',
            ['programa/create'],
            ['class' => 'listausu']
        ) ?>
        <?= Html::a(
            Html::img('@web/img/icons/icon-lista-selecionada.png', ['class' => 'iconosa']) . ' Lista de Programas',
            ['programa/index'],
            ['class' => 'listaususelected']
        ) ?>
    </div>

    <div class="table-container">
        <div class="container2">
            <div class="buscar">
                <?php $form = ActiveForm::begin([
                    'action' => ['index'],
                    'method' => 'get',
                ]); ?>
                <?= $form->field($searchModel, 'nombre_programa')
                    ->textInput(['placeholder' => 'Buscar por programa',
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
                    'options' => ['class' => 'pagination paginador text-light'], // Cambia las clases CSS
                    'linkOptions' => ['class' => ' paginador1 ', 'style' => 'background: #39A900; border: 0px 0px 5px  0px; color:white'], // Cambia las clases de los enlaces
                    'prevPageLabel' => '<<', // Etiqueta del botón "Anterior"
                    'nextPageLabel' => '>>',    // Etiqueta del botón "Último"
                    'maxButtonCount' => 5, // Número máximo de botones
                ],
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                [
                    'attribute' => 'codigo_programa',
                    'enableSorting' => false,
                ],
                [
                    'attribute' => 'nombre_programa',
                    'enableSorting' => false,
                ],
                [
                    'attribute' => 'nivel_formacion',
                    'enableSorting' => false,
                ],
                [
                    'attribute' => 'version',
                    'enableSorting' => false,
                ],
                [
                    'attribute' => 'horas',
                    'enableSorting' => false,
                ],
                [
                    'attribute' => 'meses',
                    'enableSorting' => false,
                ],
                [
                    'attribute' => 'fecha_creacion',
                    'enableSorting' => false,
                ],
                [
                    'attribute' => 'red_id_FK',
                    'label' => 'Red',
                    'enableSorting' => false,
                    'value' => function ($model) {
                        return $model->red ? $model->red->nombre_red : 'N/A';
                    },
                ],
                [
                    'class' => ActionColumn::class,
                    'header' => 'Acciones',
                    'template' => '{delete}',
                    'buttons' => [
                        'delete' => function ($url, $model) {
                            return Html::a(
                                '<i class="bi bi-trash-fill" style="color: #38A800; font-size: 1.2rem;"></i>',
                                $url,
                                [
                                    'title' => 'Eliminar',
                                    'data-confirm' => '¿Está seguro de que desea eliminar este programa?',
                                    'data-method' => 'post',
                                ]
                            );
                        },
                    ],
                    'urlCreator' => function ($action, Programa $model, $key, $index, $column) {
                        return Url::toRoute([$action, 'pro_id' => $model->pro_id]);
                    },
                ],
            ],
            'headerRowOptions' => ['class' => 'header1'],
        ]); ?>
    </div>
</div>
