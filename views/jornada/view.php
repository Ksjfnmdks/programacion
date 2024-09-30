<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\TblJornadas $model */

$this->title = $model->descripcion;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Jornadas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tbl-jornadas-view-container">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'jor_id' => $model->jor_id], ['class' => 'btn boton']) ?>
        <?= Html::a('Eliminar', ['delete', 'jor_id' => $model->jor_id], [
            'class' => 'btn boton',
            'data' => [
                'confirm' => 'Estas seguro que quieres eliminar este registro?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'jor_id',
            'descripcion',
            'hora_inicio',
            'hora_fin',
            'fecha_creacion',
        ],
    ]) ?>

</div>
<!-- Estilos -->
<style>
.tbl-jornadas-view-container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 10px;
    box-shadow: 20px 20px 20px  20px rgba(0.1, 0.1, 0.1, 0.1);
    font-family: Arial, sans-serif;
}

.view-title {
    font-size: 28px;
    font-weight: bold;
    color: #333;
    text-align: center;
    margin-bottom: 30px;
}

.view-actions {
    text-align: center;
    margin-bottom: 20px;
}

.view-actions .btn {
    margin: 0 10px;
    padding: 10px 20px;
    font-size: 16px;
    border-radius: 5px;
}

.view-actions .btn-primary {
    background-color: #007bff;
    border-color: #007bff;
    color: #fff;
}

.view-actions .btn-danger {
    background-color: #dc3545;
    border-color: #dc3545;
    color: #fff;
}

.view-details {
    margin-top: 20px;
}

.table {
    width: 100%;
    border-collapse: collapse;
    margin: 0 auto;
}

.table th, .table td {
    padding: 15px;
    text-align: left;
    border: 1px solid #ddd;
    font-size: 16px;
}

.table th {
    background-color: #f2f2f2;
    font-weight: bold;
    color: #555;
}

.table tr:nth-child(even) {
    background-color: #f9f9f9;
}

.table tr:hover {
    background-color: #f1f1f1;
}

.boton{
    background: #38A800;
}
</style>
