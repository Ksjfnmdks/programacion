<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Red $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="red-form">
    <br>
    <div class="contenedor-titulo d-flex flex-column justify-content-center">
        <div class="titulo-crear fw-bold w-20 align-self-center" style="letter-spacing: 3px">Crear red</div>
    </div>
    <br>
    <div class="linea-form col-11 w-200" style="width: 100% !important;"></div>
    <br>
    <?php $form = ActiveForm::begin(); ?>
    <div class="contenedor-red d-flex flex-column justify-content-center align-items-center w-100">
        <?= $form->field($model, 'nombre_red', [
        'labelOptions' => ['class' => 'mi-label-estilo']
            ])->textInput([
                'class' => 'form-control col-md-6 col-sm-8 col-xs-12',
                'maxlength' => true, 
                'placeholder' => 'Nombre de la red',
                'style'=>'border-radius: 10px; width: 23vw; height: 7vh; font-size: 18px;'
            ])
        ?>
        <br>
    </div>
    
    <br>
    <div class="form-group d-flex flex-row justify-content-end" style="height: 5vh;">
        <?= Html::submitButton('Crear', ['class'=> 'btn-crear-red col-12 col-sm-12','style' => 'background: #39A900; width: 6vw; height: 5vh; font-size: 20px;']) ?>
    </div>
    <br>
    <br>
    <?php ActiveForm::end(); ?>

</div>