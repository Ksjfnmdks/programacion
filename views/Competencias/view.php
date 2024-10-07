<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\CompetenciasModel $model */

$this->title = $model->id_com;
$this->params['breadcrumbs'][] = ['label' => 'Competencias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<style>
    body {
        background-color: #f8f9fa;
    }
    .header {
        border-bottom: 0.3px solid grey;
        color: rgb(0, 0, 0);
        padding: 10px;
        text-align: center;
    }
    .btn:hover {
        background-color: #38A800;
    }
    .card {
        border-radius: 15px;
        box-shadow: 0px 0px 8px rgba(0, 0, 0, 0.4);
    }
    .detail-view {
        background-color: #f1f1f1;
        border-radius: 10px;
        padding: 15px;
        border: 1px solid #ddd;
    }
    .detail-view td {
        background-color: white;
        padding: 10px;
        border: 1px solid #ddd;
    }
    .detail-view th {
        background-color: #e9ecef;
        color: #333;
        padding: 10px;
        border: 1px solid #ddd;
    }
</style>

<div class="container-fluid mt-4">

    <div class="text-center">
        <h1 style="border-bottom: 2px solid grey; display: inline-block; width: 600px">Detalles de Competencia</h1>
    </div>

    <div class="d-flex justify-content-center my-3 mt-5">
        <?= Html::a('<i class="bi bi-plus-circle"></i> Crear Competencia', ['create'], ['class' => 'btn btn-outline-success mx-2', 'escape' => false]) ?>
        <?= Html::a('<i class="bi bi-list-ul"></i> Lista de Competencias', ['index'], ['class' => 'btn btn-outline-success mx-2']) ?>
        <?= Html::a('<i class="bi bi-list-ul"></i> Lista de Asignaciones', ['/asignaciones/index'], ['class' => 'btn btn-outline-success mx-2']) ?>
    </div>

    <div class="d-flex justify-content-center" style="margin-top: 50px; margin-bottom: 50px">
        <div class="card p-4" style="width: 500px;">
            <h5 class="text-center pb-3">Competencia <?= Html::encode($this->title) ?></h5>

            <?= DetailView::widget([
                'model' => $model,
                'options' => ['class' => 'detail-view'],
                'attributes' => [
                    'id_com',
                    'codigo',
                    'nombre',
                    'cant_horas',
                    'fecha_creacion',
                    'descripcion',
                ],
            ]) ?>

            <div class="d-flex justify-content-center mt-4">
                <?= Html::a('Actualizar', ['update', 'id_com' => $model->id_com], [
                    'class' => 'btn btn-outline-success mx-2',
                ]) ?>
                <?= Html::a('Eliminar', ['delete', 'id_com' => $model->id_com], [
                    'class' => 'btn btn-outline-danger mx-2',
                    'style' => 'background-color: red; color: white;',
                    'data' => [
                        'confirm' => '¿Desea eliminar este dato?',
                        'method' => 'post',
                    ],
                ]) ?>
            </div>
        </div>
    </div>
</div>
