<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\FichaSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="fichas-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'fic_id') ?>

    <?= $form->field($model, 'codigo') ?>

    <?= $form->field($model, 'fecha_incio') ?>

    <?= $form->field($model, 'fecha_final') ?>

    <?= $form->field($model, 'pro_id_FK') ?>

    <?php // echo $form->field($model, 'instrcutor_lider') ?>

    <?php // echo $form->field($model, 'jor_id_FK') ?>

    <?php // echo $form->field($model, 'fecha_creacion') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
