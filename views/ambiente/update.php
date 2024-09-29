<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Ambientes $model */

$this->title = 'Update Ambientes: ' . $model->amb_id;
$this->params['breadcrumbs'][] = ['label' => 'Ambientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->amb_id, 'url' => ['view', 'amb_id' => $model->amb_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ambientes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', ['model' => $model,]) ?>

</div>
