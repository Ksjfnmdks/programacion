<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\TblJornadas $model */

$this->title = 'Update Tbl Jornadas: ' . $model->jor_id;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Jornadas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->jor_id, 'url' => ['view', 'jor_id' => $model->jor_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-jornadas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
