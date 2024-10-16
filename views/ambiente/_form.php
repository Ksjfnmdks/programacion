<?php

use app\models\Red;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */
/** @var app\models\Ambiente $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="ambientes-form-container">
    <h2 class="form-title" style="letter-spacing: 3px;">Nuevo ambiente</h2>

    <div class="linea2"> </div>
    <br>
    <?php $form = ActiveForm::begin(); ?>

    <div class="form-row">
        <?= $form->field($model, 'nombre_ambiente')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'capacidad')->textInput(['type' => 'number', 'min' => 1]) ?>
    </div>

    <div class="form-row">
        <?= $form->field($model, 'estado')->dropDownList(
            [
                'activo' => 'Activo',
                'inactivo' => 'Inactivo',
                'pendiente' => 'mantenimiento'
            ], 
        ['prompt' => 'Selecciona un estado']
        ) ?>

        <?= $form->field($model, 'nombre_red')->dropDownList(
                ArrayHelper::map(Red::find()->all(), 'red_id', 'nombre_red'), 
                ['prompt' => 'Seleccione una red']
        )?>
    </div>  
    <?= $form->field($model, 'recursos')->textarea(['rows' => 4]) ?>


    
    <div class="form-group">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
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
    width: 100%; 
    margin: 0 auto; 
    height: 100%;
}

.form-row {
    display: flex;
    justify-content: space-between; /* Espacio entre los inputs */
    gap: 20px; /* Ajusta el espacio entre los inputs */
}

.form-row .form-group {
    flex: 1; /* Los inputs ocuparán el mismo espacio */
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