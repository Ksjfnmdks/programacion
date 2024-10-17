<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use yii\web\View;
use yii\widgets\LinkPager;

$this->title = 'Lista de Jornadas';
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

<link href='https://fonts.googleapis.com/css?family=Work+Sans' rel='stylesheet'>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css" rel="stylesheet">

<div class="Contabla">
    <div class="titulo">
        <h1>Lista de Jornadas</h1>
    </div>
    <hr class="divider">

    <div class="lista">
        <?= Html::a(
            Html::img('@web/img/icons/icon-crear.png', ['class' => 'iconosa']) . ' Crear Jornada', 
            ['jornada/create'], 
            ['class' => 'listausu']
        ) ?>
        <?= Html::a(
            Html::img('@web/img/icons/icon-lista-selecionada.png', ['class' => 'iconosa']) . ' Lista de Jornadas', 
            ['jornada/index'], 
            ['class' => 'listaususelected']
        ) ?>
    </div>

    <div class="table-container">
        <div class="BuscarUsu">
            <?php $form = ActiveForm::begin([
                'action' => ['index'],
                'method' => 'get',
            ]); ?>

            <?= $form->field($searchModel, 'descripcion')
                ->textInput([
                    'placeholder' => 'Buscar',
                    'style' => 'background:rgb(205, 205, 205); border-radius: 20px; height: 40px; font-weight: bold;'
                ])->label(false) ?>

            <?php ActiveForm::end(); ?>
        </div>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'options' => ['class' => 'table table-striped'],
            'summary' => 'Mostrando {begin} - {end} de {totalCount} Jornadas.',
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
                    'attribute' => 'descripcion',
                    'enableSorting' => false,
                ],
                [
                    'attribute' => 'hora_inicio',
                    'enableSorting' => false,
                ],
                [
                    'attribute' => 'hora_fin',
                    'enableSorting' => false,
                ],
                [
                    'attribute' => 'fecha_creacion',
                    'enableSorting' => false,
                ],
                [
                    'class' => 'yii\grid\ActionColumn',
                    'header' => 'Acciones',
                    'template' => '{update} {delete}',
                    'buttons' => [
                        'update' => function ($url, $model) {
                            return Html::a(
                                '<i class="bi bi-pencil-fill" style="color: #38A800; font-size: 1.2rem;"></i>',
                                ['jornada/update', 'jor_id' => $model->jor_id],
                                ['class' => 'btn btn-sm']
                            );
                        },
                        'delete' => function ($url, $model) {
                            return Html::a(
                                '<i class="bi bi-trash-fill" style="color: #38A800; font-size: 1.2rem;"></i>',
                                ['jornada/delete', 'jor_id' => $model->jor_id],
                                [
                                    'class' => 'btn btn-sm',
                                    'data-confirm' => '¿Está seguro de que desea eliminar esta jornada?',
                                    'data-method' => 'post',
                                ]
                            );
                        },
                    ],
                ],
            ],
            'headerRowOptions' => ['class' => 'header1'],
        ]); ?>
    </div>
</div>
