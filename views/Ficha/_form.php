<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\TblFichas $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="tbl-fichas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'codigo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fecha_incio')->textInput() ?>

    <?= $form->field($model, 'fecha_final')->textInput() ?>

    <?= $form->field($model, 'pro_id_FK')->textInput() ?>

    <?= $form->field($model, 'instructor_lider')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jor_id_FK')->textInput() ?>

    <?= $form->field($model, 'fecha_creacion')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
