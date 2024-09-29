<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\TblJornadas $model */

$this->title = $model->jor_id;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Jornadas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tbl-jornadas-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'jor_id' => $model->jor_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'jor_id' => $model->jor_id], [
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
            'jor_id',
            'descripcion',
            'hora_inicio',
            'hora_fin',
            'fecha_creacion',
        ],
    ]) ?>

</div>
