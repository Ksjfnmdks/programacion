<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Competenciasxprogramas $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="competenciasxprogramas-form w-100">
    <br>
    <div class="contenedor-titulo d-flex flex-column justify-content-center">
        <div class="titulo-asignar fw-bold w-20 align-self-center" style="letter-spacing: 2px;">Asignar competencia</div>
    </div>
    <br>
    <div class="linea-form d-flex flex-row col-12 col-sm-12 col-md-11 bg-black align-self-center"></div>
    <br>
    <?php $form = ActiveForm::begin(); ?>
    <div class="contenedor-red d-flex flex-column align-items-center justify-content-center" style="height: 27vh;">
        <?= $form->field($model, 'id_pro_fk', [
            'labelOptions'=>['class'=>'estilo-programa'],
            'errorOptions'=>['class'=>'custom-error']
        ])->dropDownList(
            \app\models\Programa::find()->select(['nombre_programa','pro_id'])->indexBy('pro_id')->column(),
            [
                'prompt'=>'Seleccione una red',
                'style'=>'width: 25vw; height: 6vh; font-size: 14px; font-family: Work-sans, sans-serif; ',
            ]
        ) ?>
    
        <?= $form->field($model, 'id_com_fk', [
            'labelOptions'=>['class'=>'estilo-programa'],
            'errorOptions'=>['class'=>'custom-error']
        ])->dropDownList(
            \app\models\Competencias::find()->select(['nombre','id_com'])->indexBy('id_com')->column(),
            [
                'prompt'=>'Seleccione una red',
                'style'=>'width: 25vw; height: 6vh; font-size: 14px; font-family: Work-sans, sans-serif; ',
            ]
        ) ?>
    </div>
    <br><br>
    <div class="form-group d-flex flex-row justify-content-end" style="height: 5vh; margin-top: 0vh; margin-left: 5vw;">
        <?= Html::submitButton('Asignar', ['class'=> 'btn-crear-red col-12 col-sm-12','style' => 'background: #39A900; width: 8vw; height: 5vh; font-size: 20px;']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
