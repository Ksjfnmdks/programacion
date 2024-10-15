<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Programa $model */

$this->title = $model->pro_id;
$this->params['breadcrumbs'][] = ['label' => 'Programas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="programa-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'pro_id' => $model->pro_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'pro_id' => $model->pro_id], [
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
            'pro_id',
            'codigo_programa',
            'nombre_programa',
            'nivel_formacion',
            'version',
            'horas',
            'meses',
            'red_id_FK',
            'fecha_creacion',
        ],
    ]) ?>

</div>
