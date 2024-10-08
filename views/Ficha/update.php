<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Jornadas;
use app\models\Programas;
use app\models\Usuarios;

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
        <h1>Actualizar ficha</h1>
    </div>
    <div class="UsuariosForm">

        <?php $form = ActiveForm::begin(); ?>

        <div class="ficha">
            <?= $form->field($model, 'codigo')->textInput(['maxlength' => true, 'placeholder' => 'codigo']) ?>

            <!-- Usar input tipo date para seleccionar fechas -->
            <?= $form->field($model, 'fecha_incio')->textInput(['type' => 'date']) ?>
            <?= $form->field($model, 'fecha_final')->textInput(['type' => 'date']) ?>

            <!-- Cambiar etiquetas a "Programa" y "Jornada" -->
            <?= $form->field($model, 'pro_id_FK')->dropDownList(
                ArrayHelper::map(Programas::find()->all(), 'pro_id', 'nombre_programa'), 
                ['prompt' => 'Seleccione un programa']
            )->label('Programa') ?>

            <?= $form->field($model, 'instructor_lider')->textInput(['maxlength' => true, 'placeholder' => 'instructor lider']) ?>

            <?= $form->field($model, 'jor_id_FK')->dropDownList(
                ArrayHelper::map(Jornadas::find()->all(), 'jor_id', 'descripcion'), 
                ['prompt' => 'Seleccione una jornada']
            )->label('Jornada') ?>
        </div>

        <div class="boton">
            <?= Html::submitButton('actualizar', ['class' => 'btn-registrar']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
