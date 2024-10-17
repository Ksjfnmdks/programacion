<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Jornadas;
use app\models\Programa;
use app\models\Usuarios;

/** @var yii\web\View $this */
/** @var app\models\Fichas $model */
$this->registerCssFile("@web/css/UsuariosForm.css", ['depends' => [yii\web\YiiAsset::className()]]);
$this->registerCssFile("@web/css/ficha.css", ['depends' => [yii\web\YiiAsset::className()]]);

// Script para calcular la fecha final automáticamente y mensaje de confirmación al guardar
$script = <<< JS
// Función para calcular la fecha final
function calcularFechaFinal() {
    var fechaInicio = document.getElementById('fecha-inicio-id').value;
    var programaId = document.getElementById('programa-id').value;

    if (fechaInicio && programaId) {
        var duracionMeses = document.getElementById('programa-id').selectedOptions[0].getAttribute('data-duracion');
        
        if (duracionMeses) {
            var fecha = new Date(fechaInicio);
            fecha.setMonth(fecha.getMonth() + parseInt(duracionMeses));
            
            var anio = fecha.getFullYear();
            var mes = ('0' + (fecha.getMonth() + 1)).slice(-2);
            var dia = ('0' + fecha.getDate()).slice(-2);
            
            document.getElementById('fecha-final-id').value = anio + '-' + mes + '-' + dia;
        }
    }
}

// Escuchar eventos de cambios
document.getElementById('fecha-inicio-id').addEventListener('input', calcularFechaFinal);
document.getElementById('programa-id').addEventListener('change', calcularFechaFinal);

// Mensaje de confirmación al enviar el formulario
document.querySelector('form').addEventListener('beforeSubmit', function(e) {
    if (!confirm('¿Estás seguro de que deseas guardar la ficha?')) {
        e.preventDefault(); // Evitar que el formulario se envíe si el usuario cancela
    }
});

// Ocultar el mensaje de éxito después de 10 segundos
setTimeout(function() {
    var successMessage = document.querySelector('.alert-success');
    if (successMessage) {
        successMessage.style.display = 'none';
    }
}, 10000);

JS;
$this->registerJs($script);
?>

<style>
/* Estilos adicionales para hacer el formulario y los enlaces flexibles */

/* Flexibilidad para el contenedor de los enlaces */
.lista {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between; /* Asegura que los enlaces se separen completamente */
    gap: 30px; /* Espacio entre los elementos */
    margin-bottom: 20px; /* Añadir espacio inferior */
}

/* Flexibilidad para el contenedor de los campos del formulario */
.ficha, .boton {
    display: flex;
    flex-direction: column;
    gap: 15px;
}

/* Flexibilidad en anchos de pantalla medianos y grandes */
@media (min-width: 768px) {
    .ficha {
        flex-direction: row;
        flex-wrap: wrap;
    }

    .ficha > div {
        flex: 1;
        min-width: 250px;
    }

    /* Centramos el botón en la pantalla */
    .boton {
        justify-content: center;
        align-items: center;
    }
}

/* Ajustes para pantallas más pequeñas */
@media (max-width: 767px) {
    .ficha > div {
        width: 100%;
    }
    
    .boton {
        display: flex;
        justify-content: center;
        align-items: center;
    }
}
</style>

<div class="containerUsu">
    <?php if (Yii::$app->session->hasFlash('success')): ?>
        <div class="alert alert-success">
            <?= Yii::$app->session->getFlash('success') ?>
        </div>
    <?php endif; ?>
    
    <div class="lista">
        <?= Html::a(
            Html::img('@web/img/icons/icon-crear-selecionado.png', ['class' => 'iconosa']) . ' Crear ficha ', 
            '#',
            ['class' => 'listaususelected']
        ) ?>  
        <br>    
        <?= Html::a(
            Html::img('@web/img/icons/icon-lista.png', ['class' => 'iconosa']) . ' Lista de fichas', 
            ['fichas/index'], 
            ['class' => 'listausu']
        ) ?>
    </div>

    <hr class="divider">

    <div class="titulo">
        <h1>ACTUALIZAR FICHA</h1>
    </div>

    <div class="UsuariosForm">

    <?php $form = ActiveForm::begin(); ?>

    <div class="ficha">
        <?= $form->field($model, 'codigo')->textInput([
            'type' => 'text', 
            'maxlength' => 10, 
            'minlength' => 7,  
            'placeholder' => 'Código de 7 a 10 dígitos',
            'id' => 'codigo-id',
            'pattern' => '\d{7,10}', 
            'onkeypress' => 'return event.charCode >= 48 && event.charCode <= 57' 
        ])->label('Código') ?>

        <?= $form->field($model, 'fecha_incio')->textInput([
            'type' => 'date', 
            'id' => 'fecha-inicio-id' 
        ])->label('Fecha de Inicio') ?>

        <?= $form->field($model, 'pro_id_FK')->dropDownList(
            ArrayHelper::map(Programa::find()->all(), 'pro_id', 'nombre_programa'), 
            [
                'prompt' => 'Seleccione un programa',
                'id' => 'programa-id',
                'options' => ArrayHelper::map(Programa::find()->all(), 'pro_id', function ($model) {
                    return ['data-duracion' => $model->meses];
                }),
            ]
        )->label('Programa') ?>

        <?= $form->field($model, 'fecha_final')->textInput([
            'type' => 'date', 
            'id' => 'fecha-final-id', 
        ])->label('Fecha Final') ?>

        <?= $form->field($model, 'usu_id')->dropDownList(
            ArrayHelper::map(Usuarios::find()->where(['est_id_FK' => 1, 'rol_id_FK' => 2])->all(), 'usu_id', 'nombre'), 
            ['prompt' => 'Seleccione un instructor']
        )->label('Instructor líder') ?>

        <?= $form->field($model, 'jor_id_FK')->dropDownList(
            ArrayHelper::map(Jornadas::find()->all(), 'jor_id', 'descripcion'), 
            ['prompt' => 'Seleccione una jornada']
        )->label('Jornada') ?>
    </div>

    <div class="boton">
        <?= Html::submitButton('Actualizar', ['class' => 'btn-registrar']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    </div>
</div>