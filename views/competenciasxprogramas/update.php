<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Competenciasxprogramas $model */

$this->title = 'Update Competenciasxprogramas: ' . $model->id_rel;
$this->params['breadcrumbs'][] = ['label' => 'Competenciasxprogramas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_rel, 'url' => ['view', 'id_rel' => $model->id_rel]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="competenciasxprogramas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
