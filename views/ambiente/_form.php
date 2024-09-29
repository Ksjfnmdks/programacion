<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Ambiente $model */
/** @var yii\widgets\ActiveForm $form */
?>
<div class="ambientes-form-container">
    <h2 class="form-title">Nuevo ambiente</h2>

    <?php $form = ActiveForm::begin(); ?>
    <hr>
    
    <div class="form-group">
        <?= $form->field($model, 'nombre_ambiente')->textInput(['placeholder' => 'nombre del ambiente']) ?>

        <?= $form->field($model, 'descripcion')->textInput(['placeholder' => 'descripcion del ambiente']) ?>

        <?= $form->field($model, 'fecha_creacion')->input('date') ?>
    </div>

    <div class="form-group submit-btn">
        <?= Html::submitButton('Guardar', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
<style>
    /* Formulario */
.ambientes-form-container {
    background-color: #f9f9f9;
    padding: 30px;
    border-radius: 15px;
    box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
    display: inline-block;
    max-width: 600px; /* Ajusta el ancho máximo del formulario */
    margin: 0 auto; /* Centrar el formulario */
}

.ambientes-form-container .form-title {
    font-size: 18px;
    font-weight: bold;
    margin-bottom: 20px;
}

.ambientes-form-container .form-group {
    margin-bottom: 15px;
}

.ambientes-form-container .form-group input {
    width: 100%;
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