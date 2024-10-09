<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\TblJornadas $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="jornada-form-container">

    <?php $form = ActiveForm::begin(); ?>

    <div class="form-group">
        <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'hora_inicio')->input('time') ?>
        
        <?= $form->field($model, 'hora_fin')->input('time') ?>

        
    </div>

    <div class="form-group submit-btn">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<style>
/* Contenedor principal centrado */
.create-ambientes-container {
    width: 90%; /* Ancho máximo para el contenedor */
    max-width: 800px; /* Limita el tamaño máximo en pantallas grandes */
    margin: 0 auto; /* Centrar el contenedor en la página */
    height:520px;
    padding: 20px;
    
    text-align: center;
    font-family: Arial, sans-serif;
}

.jornada-form-container .submit-btn {
    display: flex; /* Cambiar a flex para controlar mejor la alineación */
    justify-content: flex-end; /* Alinea el contenido (el botón) a la derecha */
    margin-top: 20px; /* Opcional: Añadir margen superior si lo necesitas */
}


.jornada-form-container {
    background-color: white;
    padding: 30px;
    border-radius: 15px;
    box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.240);
    display: inline-block;
    width: 350px; 
    margin: 0 auto; 
    height:350px;
}

.jornada-form-container .form-group {
    margin-bottom: 15px;
    text-align: left; /* Alinear a la izquierda */
}

/* Estilos para el título */
.tbl-jornadas-form-container {
    font-size: 24px;
    font-weight: bold;
    color: #000;
    margin-bottom: 20px;
}

/* Botón en la parte superior */
.container-boton-buscar {
    margin-bottom: 20px;
    display: flex;
    justify-content: space-between; /* Alinea los botones a los lados opuestos */
    align-items: center; /* Asegura que los botones estén centrados verticalmente */
}


/* Estilos de los botones */
.boton-buscar {
    height: 35px;
    width: 150px;
    background-color: #FFFFFF;
    color: #2F7A00;
    border: 1px solid #2F7A00;
    padding: 5px;
    font-size: 16px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.3s ease;
}

.boton-buscar:hover {
    background-color: #2F7A00;
    color: #FFFFFF;
    transform: scale(1.05);
}

.boton-buscar:active {
    background-color: #265C00;
    transform: scale(0.98);
}

.linea {
    background-color: black;
}

.form-wrapper {
    margin-top: 20px; /* Añadir margen superior al formulario */
}
</style>

