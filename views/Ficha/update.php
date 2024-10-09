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

// Script para calcular la fecha final automáticamente
$script = <<< JS
// Función para calcular la fecha final
function calcularFechaFinal() {
    var fechaInicio = document.getElementById('fecha-inicio-id').value;
    var programaId = document.getElementById('programa-id').value;

    if (fechaInicio && programaId) {
        // Obtener la duración del programa desde el atributo "data-duracion"
        var duracionMeses = document.getElementById('programa-id').selectedOptions[0].getAttribute('data-duracion');
        
        if (duracionMeses) {
            // Crear un objeto de fecha
            var fecha = new Date(fechaInicio);
            // Sumar la cantidad de meses al objeto de fecha
            fecha.setMonth(fecha.getMonth() + parseInt(duracionMeses));
            
            // Formatear la fecha a YYYY-MM-DD
            var anio = fecha.getFullYear();
            var mes = ('0' + (fecha.getMonth() + 1)).slice(-2); // Agrega un cero inicial si es necesario
            var dia = ('0' + fecha.getDate()).slice(-2); // Agrega un cero inicial si es necesario
            
            // Establecer la fecha final en el campo correspondiente
            document.getElementById('fecha-final-id').value = anio + '-' + mes + '-' + dia;
        }
    }
}

// Escuchar el evento 'input' en el campo de fecha de inicio
document.getElementById('fecha-inicio-id').addEventListener('input', calcularFechaFinal);

// Escuchar el evento 'change' en el campo de programa
document.getElementById('programa-id').addEventListener('change', calcularFechaFinal);

JS;
$this->registerJs($script);

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
        <h1>Actualizar Ficha</h1>
    </div>
    <div class="UsuariosForm">

        <?php $form = ActiveForm::begin(); ?>

        <div class="ficha">
            <?= $form->field($model, 'codigo')->textInput([
                'type' => 'text',
                'maxlength' => true,
                'placeholder' => 'codigo',
                'id' => 'codigo-id' // ID único para la validación con JavaScript
            ]) ?>

            <!-- Input de tipo date para la fecha de inicio -->
            <?= $form->field($model, 'fecha_incio')->textInput([
                'type' => 'date', 
                'id' => 'fecha-inicio-id' // ID para usar en el script
            ]) ?>

            <!-- Cambiar etiquetas a "Programa" y "Jornada" -->
            <?= $form->field($model, 'pro_id_FK')->dropDownList(
                ArrayHelper::map(Programas::find()->all(), 'pro_id', 'nombre_programa'), 
                [
                    'prompt' => 'Seleccione un programa',
                    'id' => 'programa-id', // ID para usar en el script
                    'options' => ArrayHelper::map(Programas::find()->all(), 'pro_id', function ($model) {
                        return ['data-duracion' => $model->tiempo_formacion];
                    }), // Pasar la duración en meses como atributo data
                ]
            )->label('Programa') ?>

            <!-- Input de tipo date para la fecha final (se actualizará automáticamente) -->
            <?= $form->field($model, 'fecha_final')->textInput([
                'type' => 'date', 
                'id' => 'fecha-final-id', // ID para usar en el script
            ]) ?>

            <?= $form->field($model, 'instructor_lider')->textInput([
                'maxlength' => true, 
                'placeholder' => 'instructor lider'
            ]) ?>

            <?= $form->field($model, 'jor_id_FK')->dropDownList(
                ArrayHelper::map(Jornadas::find()->all(), 'jor_id', 'descripcion'), 
                ['prompt' => 'Seleccione una jornada']
            )->label('Jornada') ?>
        </div>

        <div class="boton">
            <?= Html::submitButton('guardar', ['class' => 'btn-registrar']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
