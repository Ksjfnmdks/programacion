<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\AmbienteSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="ambiente-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'amb_id') ?>

    <?= $form->field($model, 'nombre_ambiente') ?>

    <?= $form->field($model, 'capacidad') ?>

    <?= $form->field($model, 'estado') ?>

    <?= $form->field($model, 'recursos') ?>

    <?php // echo $form->field($model, 'nombre_red') ?>

    <?php // echo $form->field($model, 'fecha_creacion') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
