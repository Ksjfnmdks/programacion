<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Resultado $model */
/** @var yii\widgets\ActiveForm $form */
?>

<style>
    body {
        background-color: #f8f9fa;
    }
    .header {
        border-bottom: 0.3px solid grey;
        color: rgb(0, 0, 0);
        padding: 10px;
        text-align: center;
    }

    .btn:hover {
        background-color: #38A800;
    }


    .card {
        border-radius: 15px;
        box-shadow: 0px 0px 8px rgba(0, 0, 0, 0.4);
    }
</style>

<div class="container-fluid mt-4">
    
    <div class="d-flex justify-content-center my-3 mt-5">
    <?= Html::a('<i class="bi bi-list-ul"></i> Lista de Resultados', ['index'], ['class' => 'btn btn-outline-success mx-2', 'escape' => false]) ?>
    <?= Html::a('<i class="bi bi-list-ul"></i> Lista de Asignaciones', ['/asignaciones/index'], ['class' => 'btn btn-outline-success mx-2', 'escape' => false]) ?>
</div>

    <div class="d-flex justify-content-center" style="margin-top: 50px; margin-bottom: 50px">
        <div class="card p-4" style="width: 500px;">
            <h5 class="text-center pb-3">Resultados</h5>

            <?php $form = ActiveForm::begin(); ?>

            <div class="mb-3" style="border-top: 0.3px solid grey;">
                <?= $form->field($model, 'nombre')->textInput([
                    'maxlength' => true,
                    'class' => 'form-control',
                    'placeholder' => 'Nombre del Resultado'
                ])->label('Nombre', ['class' => 'form-label pt-3']); ?>
            </div>

            <div class="mb-3">
                <?= $form->field($model, 'horas')->textInput([
                    'class' => 'form-control',
                    'placeholder' => 'Cantidad de Horas'
                ])->label('Horas', ['class' => 'form-label']); ?>
            </div>

            <div class="mb-3">
                <?= $form->field($model, 'id_com_fk')->dropDownList($competencias, [
                    'prompt' => 'Seleccione una competencia',
                    'class' => 'form-control'
                ])->label('Competencia', ['class' => 'form-label']); ?>
            </div>

            <div class="d-flex justify-content-center mt-3">
                <?= Html::submitButton('Guardar', [
                    'class' => 'btn btn-outline-success',
                    'style' => 'padding: 7px 20px; border-radius: 5px;'
                ]) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
