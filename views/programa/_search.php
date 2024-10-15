<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\ProgramaSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="programa-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'pro_id') ?>

    <?= $form->field($model, 'codigo_programa') ?>

    <?= $form->field($model, 'nombre_programa') ?>

    <?= $form->field($model, 'nivel_formacion') ?>

    <?= $form->field($model, 'version') ?>

    <?php // echo $form->field($model, 'horas') ?>

    <?php // echo $form->field($model, 'meses') ?>

    <?php // echo $form->field($model, 'red_id_FK') ?>

    <?php // echo $form->field($model, 'fecha_creacion') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
