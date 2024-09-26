<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Red $model */

$this->title = 'Update Red: ' . $model->red_id;
$this->params['breadcrumbs'][] = ['label' => 'Reds', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->red_id, 'url' => ['view', 'red_id' => $model->red_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="red-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
