<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Usuarios $model */

$this->title = $model->usu_id;
$this->params['breadcrumbs'][] = ['label' => 'Usuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="usuarios-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'usu_id' => $model->usu_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'usu_id' => $model->usu_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'usu_id',
            'identificacion',
            'nombre',
            'apellido',
            'telefono',
            'correo',
            'username',
            'password',
            'fecha_creacion',
            'rol_id_FK',
            'est_id_FK',
        ],
    ]) ?>

</div>
