<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Ambientes $model */

$this->title = $model->nombre_ambiente;
$this->params['breadcrumbs'][] = ['label' => 'Ambientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="ambientes-view-container">

    <h1 class="view-title"><?= Html::encode($this->title) ?></h1>

    <div class="view-actions">
        <?= Html::a('Actualizar', ['update', 'amb_id' => $model->amb_id], ['class' => 'btn boton']) ?>
        <?= Html::a('Eliminar', ['delete', 'amb_id' => $model->amb_id], [
            'class' => 'btn boton',
            'data' => [
                'confirm' => '¿Estás seguro que deseas eliminar este registro?',
                'method' => 'post',
            ],
        ]) ?>
    </div>

    <div class="view-details">
        <?= DetailView::widget([
            'model' => $model,
            'options' => ['class' => 'table table-striped table-bordered detail-view'], // Estilos de tabla
            'attributes' => [
                'amb_id',
                'nombre_ambiente',
                'descripcion',
                'fecha_creacion',
            ],
        ]) ?>
    </div>

</div>

<!-- Estilos -->
<style>
.ambientes-view-container {
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
