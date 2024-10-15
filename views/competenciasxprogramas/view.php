<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Competenciasxprogramas $model */

$this->title = $model->id_rel;
$this->params['breadcrumbs'][] = ['label' => 'Competenciasxprogramas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="competenciasxprogramas-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id_rel' => $model->id_rel], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id_rel' => $model->id_rel], [
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
            'id_rel',
            'id_pro_fk',
            'id_com_fk',
        ],
    ]) ?>

</div>
