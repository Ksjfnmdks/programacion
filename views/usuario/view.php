<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Tblusuarios $model */

$this->title = $model->nombre . ' ' . $model->apellido;
$this->params['breadcrumbs'][] = ['label' => 'Lista de Personas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
$this->registerCssFile("@web/css/UsuariosForm.css", ['depends' => [yii\web\YiiAsset::className()]]);
?>
<link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;700&display=swap" rel="stylesheet">

<style>
    .header {
        border-bottom: 0.3px solid grey;
        color: rgb(0, 0, 0);
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
<div class="containerUsu">
    <?php if (Yii::$app->session->hasFlash('success')): ?>
        <div class="alert alert-success">
            <?= Yii::$app->session->getFlash('success') ?>
        </div>
    <?php endif; ?>

    <div class="titulo">
        <h1>Usuarios</h1>
    </div>
    <hr class="divider">
    <div class="lista">
        <?= Html::a(
            Html::img('@web/img/icons/icon-crear-selecionado.png', ['class' => 'iconosa']) . ' Crear Usuario', 
            ['usuario/create'],
            ['class' => 'listausu']
        ) ?>        
        <?= Html::a(
            Html::img('@web/img/icons/icon-lista.png', ['class' => 'iconosa']) . ' Lista de Usuarios', 
            ['usuario/index'], 
            ['class' => 'listausu']
        ) ?>
    </div>


    <div class="d-flex justify-content-center">
        <div class="card p-4" style="width: 800px;">
            <h5 class="text-center pb-3">Usuario: <?= Html::encode($this->title) ?></h5>

            <?= DetailView::widget([
                'model' => $model,
                'options' => ['class' => 'detail-view'],
                'attributes' => [
                    'identificacion',
                    'nombre',
                    'apellido',
                    'telefono',
                    'correo',
                    'username',
                    'password',
                    [
                        'attribute' => 'rol_id_FK',
                        'value' => $model->rolIdFK->nombre, // Mostrar nombre del rol
                    ],
                    [
                        'attribute' => 'est_id_FK',
                        'value' => $model->estIdFK->descripcion, // Mostrar descripción del estado
                    ],
                    'fecha_creacion',
                ],
            ]) ?>
            </div>
            
        </div>
        
    </div>
</div>
    <div class="d-flex justify-content-center mt-4">
        <?= Html::a('Actualizar', ['update', 'usu_id' => $model->usu_id], [
            'class' => 'btn-actualizar mx-2',
        ]) ?>
