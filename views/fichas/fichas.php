<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\web\YiiAsset;

/** @var yii\web\View $this */
/** @var app\models\FichasSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Listado de Fichas ';
$this->registerCssFile("@web/css/UsuariosForm.css", ['depends' => [YiiAsset::class]]);
$this->registerCssFile("@web/css/ficha.css", ['depends' => [YiiAsset::class]]);
$this->registerCssFile('@web/css/tablas.css', ['depends' => [YiiAsset::class]]);

// Personaliza el CSS para la tabla
$this->registerCss("
    .table td, .table th {
        font-size: 19px; /* Aumenta el tamaño de la fuente a 19px */
        color: black; /* Cambiar color del texto a negro */
    }
    .action-column a {
        color: #38A800; /* Cambiar color de los enlaces en la columna de acciones a verde */
    }
    .action-column a:hover {
        color: #2d6a27; /* Color verde más oscuro al pasar el cursor */
    }
");
?>

<div class="Contabla">
    <h2><?= Html::encode($this->title) ?></h2>

    <div class="table-container">
        <div class="BuscarUsu">
            <?php $form = ActiveForm::begin([
                'action' => ['fichas'],
                'method' => 'get',
            ]); ?>
            
            <?= $form->field($searchModel, 'globalSearch')->textInput(['placeholder' => 'Buscar...'])->label(false) ?>
            <?php ActiveForm::end(); ?>
        </div>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'tableOptions' => ['class' => 'table'],
            'options' => ['class' => 'table table-striped'],
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                [
                    'attribute' => 'codigo',
                    'enableSorting' => false,
                    'headerOptions' => ['style' => 'background-color: #38A800; color: #fff; font-weight: bold;'],
                ],
                [
                    'attribute' => 'fecha_incio',
                    'enableSorting' => false,
                    'headerOptions' => ['style' => 'background-color: #38A800; color: #fff; font-weight: bold;'],
                ],
                [
                    'attribute' => 'programa',
                    'value' => 'proIdFK.nombre_programa',
                    'headerOptions' => ['style' => 'background-color: #38A800; color: #fff; font-weight: bold;'],
                ],
                [
                    'attribute' => 'duracion programa',
                    'value' => function($model) {
                        return $model->proIdFK->meses . ' meses'; // Concatenar "meses"
                    },
                    'headerOptions' => ['style' => 'background-color: #38A800; color: #fff; font-weight: bold;'],
                ],
                [
                    'attribute' => 'fecha_final',
                    'enableSorting' => false,
                    'headerOptions' => ['style' => 'background-color: #38A800; color: #fff; font-weight: bold;'],
                ],
                [
                    'attribute' => 'Instructor lider',
                    'value' => 'usu.nombre',
                    'headerOptions' => ['style' => 'background-color: #38A800; color: #fff; font-weight: bold;'],
                ],
                [
                    'attribute' => 'jornada',
                    'value' => 'jorIdFK.descripcion',
                    'headerOptions' => ['style' => 'background-color: #38A800; color: #fff; font-weight: bold;'],
                ],
                [
                    'attribute' => 'fecha_creacion',
                    'enableSorting' => false,
                    'headerOptions' => ['style' => 'background-color: #38A800; color: #fff; font-weight: bold;'],
                ],
            ],
        ]); ?>
    </div>
</div>
