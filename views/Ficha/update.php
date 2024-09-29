<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Fichas $model */

$this->title = 'Update Fichas: ' . $model->fic_id;
$this->params['breadcrumbs'][] = ['label' => 'Fichas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->fic_id, 'url' => ['view', 'fic_id' => $model->fic_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="fichas-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
