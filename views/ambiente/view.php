<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Ambiente $model */

$this->title = $model->amb_id;
$this->params['breadcrumbs'][] = ['label' => 'Ambientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="ambiente-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'amb_id' => $model->amb_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'amb_id' => $model->amb_id], [
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
            'amb_id',
            'nombre_ambiente',
            'capacidad',
            'estado',
            'recursos:ntext',
            'nombre_red',
            'fecha_creacion',
        ],
    ]) ?>

</div>
