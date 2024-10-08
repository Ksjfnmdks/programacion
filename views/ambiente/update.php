<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Ambiente $model */

$this->title = 'Update Ambiente: ' . $model->amb_id;
$this->params['breadcrumbs'][] = ['label' => 'Ambientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->amb_id, 'url' => ['view', 'amb_id' => $model->amb_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ambiente-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
