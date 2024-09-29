<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Fichas $model */

$this->title = $model->fic_id;
$this->params['breadcrumbs'][] = ['label' => 'Fichas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="fichas-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'fic_id' => $model->fic_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'fic_id' => $model->fic_id], [
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
            'fic_id',
            'codigo',
            'fecha_incio',
            'fecha_final',
            'pro_id_FK',
            'instrcutor_lider',
            'jor_id_FK',
            'fecha_creacion',
        ],
    ]) ?>

</div>
