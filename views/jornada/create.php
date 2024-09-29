<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\TblJornadas $model */

$this->title = 'Create Tbl Jornadas';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Jornadas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-jornadas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
