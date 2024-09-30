<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\TblJornadas $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="tbl-jornadas-form-container">

    <?php $form = ActiveForm::begin(); ?>

<div class="form-group">
        <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'hora_inicio')->textInput(['type' => 'time']) ?>

        <?= $form->field($model, 'hora_fin')->textInput(['type' => 'time']) ?>

        <?= $form->field($model, 'fecha_creacion')->Input('date') ?>
    </div>

    <div class="form-group submit-btn">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<style>
    /* Formulario */
.Tbl-jornadas-form-container {
    background-color: #f9f9f9;
    padding: 30px;
    border-radius: 15px;
    box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
    display: inline-block;
    max-width: 600px; /* Ajusta el ancho máximo del formulario */
    margin: 0 auto; /* Centrar el formulario */
}

.Tbl-jornadas-form-container .form-title {
    font-size: 18px;
    font-weight: bold;
    margin-bottom: 20px;
}

.Tbl-jornadas-form-container .form-group {
    margin-bottom: 15px;
}

.Tbl-jornadas-form-container .form-group input {
    width: 100%;
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
}

.Tbl-jornadas-form-container .submit-btn {
    text-align: right;
}

.Tbl-jornadas-form-container .btn-success {
    background-color: #28a745;
    color: #fff;
    border: none;
    padding: 10px 20px;
    font-size: 16px;
    border-radius: 5px;
    cursor: pointer;
}

.Tbl-jornadas-form-container .btn-success:hover {
    background-color: #218838;
}

/* Responsividad */
@media (max-width: 768px) {
    .Tbl-jornadas-form-container {
        width: 90%;
    }

    .Tbl-jornadas-form-container .form-title {
        font-size: 16px;
    }
}
</style>