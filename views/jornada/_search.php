<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\JornadaSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="tbl-jornadas-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'jor_id') ?>

    <?= $form->field($model, 'descripcion') ?>

    <?= $form->field($model, 'hora_inicio') ?>

    <?= $form->field($model, 'hora_fin') ?>

    <?= $form->field($model, 'fecha_creacion') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
