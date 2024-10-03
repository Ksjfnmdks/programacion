<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Ambiente $model */
/** @var yii\widgets\ActiveForm $form */
?>
<div class="ambientes-form-container">
    <h2 class="form-title" style="letter-spacing: 3px;">Nuevo ambiente</h2>

    <div class="linea2"> </div>
    <br>

    <?php $form = ActiveForm::begin(); ?>
    
    <div class="form-group">
        <?= $form->field($model, 'nombre_ambiente')->textInput(['placeholder' => 'nombre del ambiente'])->label('Nombre del Ambiente') ?>
        <?= $form->field($model, 'descripcion')->textInput(['placeholder' => 'descripcion del ambiente'])->label('Descripción') ?>
        
    </div>

    <div class="form-group submit-btn">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success boton']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
<style>
.boton{
    background-color: black;
}
.ambientes-form-container {
    background-color: white;
    padding: 30px;
    border-radius: 15px;
    box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.237);
    display: inline-block;
    width: 450px; 
    margin: 0 auto; 
}

.linea2 {
    background-color: black;
    width: 100%;
    height: 2px;
}    

.ambientes-form-container .form-title {
    font-size: 18px;
    font-weight: bold;
    margin-bottom: 20px;
}

.ambientes-form-container .form-group {
    margin-bottom: 15px;
    text-align: left; /* Alinear a la izquierda */
}

.ambientes-form-container .form-group input {
    width: 100%; /* Asegurarse de que ocupen todo el ancho */
    padding: 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
}

.ambientes-form-container .submit-btn {
    text-align: right;
}

.ambientes-form-container .btn-success {
    background-color: #28a745;
    color: #fff;
    border: none;
    padding: 10px 20px;
    font-size: 16px;
    border-radius: 5px;
    cursor: pointer;
}

.ambientes-form-container .btn-success:hover {
    background-color: #218838;
}



/* Responsividad */
@media (max-width: 768px) {
    .ambientes-form-container {
        width: 90%;
    }

    .ambientes-form-container .form-title {
        font-size: 16px;
    }
}
</style>