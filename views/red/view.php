<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Red $model */

$this->title = $model->red_id;
$this->params['breadcrumbs'][] = ['label' => 'Redes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="red-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'red_id' => $model->red_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'red_id' => $model->red_id], [
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
            'red_id',
            'nombre_red',
        ],
    ]) ?>

</div>
