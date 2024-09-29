<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\TblFichas $model */

$this->title = 'Update Tbl Fichas: ' . $model->fic_id;
$this->params['breadcrumbs'][] = ['label' => 'Tbl Fichas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->fic_id, 'url' => ['view', 'fic_id' => $model->fic_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tbl-fichas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
