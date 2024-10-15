
<?php

use app\assets\AppAsset;
use app\models\Competenciasxprogramas;
use app\models\Programa;
use yii\bootstrap5\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\LinkPager;
use yii\widgets\DetailView;


/** @var yii\web\View $this */
/** @var app\models\ProgramaSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */
/** @var yii\data\Pagination $Pagination */
/** @var app\models\Programa $searchModel */


$this->title = 'Programas';
?>


<style>
    .header1 {
        height: 10vh;
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


<div class="programa-index">
    <div class="d-flex col-sm-12 col-xs-12 col-xl-12 col-md-12 justify-content-center flex-column align-items-center text-center" style="width: 80vw;">
        <br>
        <h1 class="titulo-principal text-dark fw-bold"> Asignar Competencias</h1>
        <div class="linea1 bg-black"></div>
        <br>
        <div class=" contenedor-menu d-flex flex-row justify-content-between">
            <div class="d-flex flex-row w-40 h-30">
                <div class="w-30 h-30">
                    <img src="img/icons/boton-agregar.png" alt="agregar">
                </div>
                <div class="w-40 h-30">
                    <h4 class="">
                        <?= Html::a(' <p class="letra lista-redes">&nbsp;Crear &nbsp;Asignación</p>', ['create'], [
                            'class' => ' fw-bolder icon-link icon-link-hover',
                            'style' => 'color: black; text-decoration: none; font-size: 1.5rem;',
                            'encode' => false
                        ]) ?>
                    </h4>
                </div>
            </div>
            <div class="d-flex flex-row w-40 h-30">
                <div class="w-70 h-30">
                    <h4 class="">
                        <?= Html::a(
                            ' <p class="letra "><img src="img/icons/controlar.png" alt="agregar">&nbsp;Lista de &nbsp;Asignaciones</p>',
                            ['index'],
                            [
                                'class' => 'fw-bolder icon-link icon-link-hover',
                                'style' => 'color: gray; text-decoration: none; font-size: 1.5rem; pointer-events: none; cursor: default;',
                                'encode' => false
                            ]
                        ) ?>
                    </h4>
                </div>
            </div>
        </div>
        <br>


        <div class="d-flex flex-row col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 justify-content-end" style="width:80vw; color:white; padding-right:10px">

            <div class="programa-search col-4">

                <?php $form = ActiveForm::begin([
                    'action' => ['index'],
                    'method' => 'get',
                ]); ?>

                <?= $form->field($searchModel, 'id_pro_fk')->textInput([
                    'placeholder' => 'Buscar por Codigo de Programa',
                    'style' => 'background:rgb(205, 205, 205); border-radius: 20px; height: 40px;
                                                                    font-weight: bold;'
                ])
                    ->label(false) ?>
                <?php ActiveForm::end(); ?>
            </div>
        </div>


        <br>

        <div class=" table-responsive col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 d-flex flex-row justify-content-center"
            style=" height:50vh">

            <?= GridView::widget([

                'dataProvider' => $dataProvider,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    //'id_rel',
                    //'id_pro_fk',
                    [
                        'attribute' => 'id_pro_fk',
                        'label' => 'Codigo del Programa',
                    ],    
                    [
                        'attribute' => 'id_pro_fk',
                        'label' => 'Nombre del Programa',
                        'value' => function ($model) {
                            return $model->programa ? $model->programa->nombre_programa : 'N/A';
                        },
                    ],
                    [
                        'attribute' => 'id_com_fk',
                        'label' => 'Competencia',
                        'value' => function ($model) {
                            return $model->competencia ? $model->competencia->nombre : 'N/A';
                        },
                    ],
                ],
                'pager' => [
                    'class' => LinkPager::class,
                    'options' => ['class' => 'pagination paginador text-light'], // Cambia las clases CSS
                    'linkOptions' => ['class' => 'page-link paginador1 ', 'style' => 'background: #39A900; border: 0px 0px 5px  0px; color:white'], // Cambia las clases de los enlaces
                    'prevPageLabel' => '<<', // Etiqueta del botón "Anterior"
                    'nextPageLabel' => '>>',    // Etiqueta del botón "Último"
                    'maxButtonCount' => 5, // Número máximo de botones
                ],
                'summary' => false,
                'headerRowOptions' => ['class' => 'header1'],

            ]);
            ?>
        </div>

    </div>
</div>
<style>
    .linea1 {
        width: 90%;
        height: 1px;
        background: black;
    }

    .linea-form {
        background: #000;
        width: 32vw;
        height: 1px;
    }

    .titulo-principal {
        font-family: 'Work sans', sans-serif;
    }

    .contenedor-menu {
        width: 70%;
        height: 30%;
    }

    .crear-red {
        font-family: 'Work sans', sans-serif;
        text-decoration: none;
        color: gray;
    }

    .lista-redes {
        font-family: 'Work sans', sans-serif;
        text-decoration: none;
        color: black;
    }

    .lista-redes:hover {
        font-family: 'Work sans', sans-serif;
        text-decoration: none;
        color: #39A900;
    }

    .titulo-crear {
        font-family: 'Work sans', sans-serif;
        font-size: 32px;
    }

    .formulario-crear-red {
        width: 521px;
        height: 301px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.237);
        border-radius: 15px;
    }

    .header1 {
        height: 10vh;
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