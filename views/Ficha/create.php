<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\TblJornadas;
use app\models\TblProgramas;
use app\models\TblUsuarios;

/** @var yii\web\View $this */
/** @var app\models\TblFichas $model */
$this->registerCssFile("@web/css/UsuariosForm.css", ['depends' => [yii\web\YiiAsset::className()]]);
$this->registerCssFile("@web/css/ficha.css", ['depends' => [yii\web\YiiAsset::className()]]);
?>

<div class="containerUsu">

    <div class="lista">
        <?= Html::a(
            Html::img('@web/img/icons/icon-crear-selecionado.png', ['class' => 'iconosa']) . ' Crear ficha ', 
            '#',
            ['class' => 'listaususelected']
        ) ?>  
        <br>    
        <?= Html::a(
            Html::img('@web/img/icons/icon-lista.png', ['class' => 'iconosa']) . ' Lista de fichas', 
            ['ficha/index'], 
            ['class' => 'listausu']
        ) ?>
    </div>
    <hr class="divider">
    <div class="titulo">
        <h1>Crear ficha</h1>
    </div>
    <div class="fichaForm">

        <?php $form = ActiveForm::begin(); ?>

        <div class="ficha">
            <?= $form->field($model, 'codigo')->textInput(['maxlength' => true, 'placeholder' => 'codigo']) ?>

            <!-- Usar input tipo date para seleccionar fechas -->
            <?= $form->field($model, 'fecha_incio')->textInput(['type' => 'date']) ?>
            <?= $form->field($model, 'fecha_final')->textInput(['type' => 'date']) ?>

            <?= $form->field($model, 'pro_id_FK')->dropDownList(
                ArrayHelper::map(TblProgramas::find()->all(), 'pro_id', 'nombre_programa'), 
                ['prompt' => 'Seleccione un programa']
            ) ?>

        <?= $form->field($model, 'instructor_lider')->textInput(['maxlength' => true, 'placeholder' => 'codigo']) ?>

            <?= $form->field($model, 'jor_id_FK')->dropDownList(
                ArrayHelper::map(TblJornadas::find()->all(), 'jor_id', 'descripcion'), 
                ['prompt' => 'Seleccione una jornada']
            ) ?>
        </div>

        <div class="boton">
            <?= Html::submitButton('guardar', ['class' => 'btn-registrar']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
