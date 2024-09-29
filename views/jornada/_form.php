<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\TblJornadas $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="tbl-jornadas-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hora_inicio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hora_fin')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fecha_creacion')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
