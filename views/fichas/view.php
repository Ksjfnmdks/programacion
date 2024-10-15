<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\TblFichas $model */

$this->title = $model->fic_id;
$this->params['breadcrumbs'][] = ['label' => 'lista de Fichas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="tbl-fichas-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'fic_id' => $model->fic_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'fic_id' => $model->fic_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Estas seguro de eliminar esta ficha?',
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
            [
                'attribute' => 'pro_id_FK',
                'value' => $model->proIdFK->nombre_programa, // Mostrar nombre del rol
            ],
            [
                'attribute' => 'usu_id',
                'value' => $model->usu->nombre, // Mostrar descripción del estado
            ],
            [
                'attribute' => 'jor_id_FK',
                'value' => $model->jorIdFK->descripcion, // Mostrar descripción del estado
            ],
            'fecha_creacion',
        ],
    ]) ?>

</div>
