<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Programas $model */
/** @var yii\widgets\ActiveForm $form */
?>
<style>
.custom-error {
    color: red;
    padding: 5px;
    border-radius: 5px;
    font-size: 15px;
}
.custom-error-version{
    color: red;
    padding: 5px;
    border-radius: 5px;
    font-size: 15px;

    margin-left: 5vw;
}
.custom-error-meses{
    color: red;
    padding: 5px;
    border-radius: 5px;
    font-size: 15px;

    margin-left: 10vw;
}
</style>
<div class="d-flex flex-column justify-content-center align-items-center col-12 col-sm-12 col-md-12 col-xl-12" style="height: 53vh; margin-top:25px;">
    <br>
    <div class="titulo-principal d-flex flex-column justify-content-center align-items-center col-12 col-sm-12 col-md-12 col-xl-12">
        <h1 class=" titulo-programa text-dark fw-bold">Crear programas</h1>
    </div>
    <div class="linea-form col-12 col-sm-12 col-md-12 " style="width: 100%;"></div>
    <br>
    <?php $form = ActiveForm::begin(); ?>
        <div class="contendor-campos d-flex flex-column col-12 col-sm-12 col-md-12 align-items-center ">
            <div class="d-flex flex-column align-items-center" style="width: 50vw; height: 45vh;">
                <div class="d-flex flex-row justify-content-evenly" style="height: 11vh; width: 45vw;">
                    <?= $form->field($model, 'codigo_programa', [
                        'labelOptions'=>['class'=>'estilo-programa input-group'],
                        'errorOptions'=>['class'=>'custom-error']
                    ])->textInput([
                        'maxlength' => true,
                        'placeholder'=>'Código',
                        'style'=>'width: 15vw; height: 5vh; font-size: 14px; font-family: Work-sans, sans-serif;'
                        
                    ]) ?>
                    <?= $form->field($model, 'nombre_programa', [
                        'labelOptions'=>['class'=>'estilo-programa input-group'],
                        'errorOptions'=>['class'=>'custom-error']
                    ])->textInput([
                        'maxlength' => true,
                        'placeholder'=>'Nombre del programa',
                        'style'=>'width: 25vw; height: 5vh; font-size: 14px; font-family: Work-sans, sans-serif;'
                    ]) ?>
                </div>
                <div class="d-flex flex-row justify-content-evenly" style="height: 11vh; width: 45vw;">
                <?= $form->field($model, 'nivel_formacion', [
                        'labelOptions'=>['class'=>'estilo-programa-red'],
                        'errorOptions'=>['class'=>'custom-error']
                    ])->dropDownList(
                        [
                            'prompt'=>'Seleccione un nivel de formacion',
                            'Tecnica'=>'Tecnica',
                            'Tecnologia'=>'Tecnologia',
                            'Curso complementario'=>'Curso complementario',
                            'Operario'=>'Operario',
                            'Auxiliar'=>'Auxiliar',
                            
                        ],[
                            'id' => 'nivel-formacion',
                            'prompt'=>'Seleccione un nivel de formación',
                            'style' => 'border-radius: 5px; width: 25vw; height: 5vh; font-size: 14px; font-family: Work-sans, sans-serif;'
                        ]
                    )?>
                    <?= $form->field($model, 'version', [
                        'labelOptions'=>['class'=>'estilo-version-programa input-group align-self-end'],
                        'errorOptions'=>['class'=>'custom-error-version']
                    ])->textInput([
                        'maxlength' => true,
                        'placeholder'=>'Versión',
                        'style'=>'width: 15vw; height: 5vh; font-size: 14px; font-family: Work-sans, sans-serif; margin-left: 5vw;',
                    ]) ?>
                </div>
                <div class="d-flex flex-row" style="height: 12vh;  width: 45vw;">
                    <div class="d-flex flex-row" style="width: 20vw; height: 12vh;">
                        <?= $form->field($model, 'horas', [
                            'labelOptions'=>['class'=>'estilo-horas-meses input-group mx-0'],
                            'errorOptions'=>['class'=>'custom-error']
                        ])->textInput([
                            'maxlength'=>true,
                            'placeholder'=>'Horas',
                            'style'=>'width: 20vw; height: 5vh; font-size: 14px; font-family: Work-sans, sans-serif; margin-left: 0vw;',
                        ]) ?>
                    </div>
                    <div class="d-flex flex-row align-self-end" style="width: 20vw; height: 12vh; justify-content: flex-end;">
                        <?= $form->field($model, 'meses', [
                            'labelOptions'=>['class'=>'estilo-horas-meses input-group'],
                            'errorOptions'=>['class'=>'custom-error-meses']
                        ])->textInput([
                            'id'=>'meses',
                            'maxlegth'=>true,
                            'placeholder'=>'Meses',
                            'style'=>'width: 20vw; height: 5vh; font-size: 14px; font-family: Work-sans, sans-serif; margin-left: 10vw;',
                        ])?>
                    </div>
                </div>
                <div class="d-flex flex-row justify-content-start" style="height: 12vh; width: 45vw;">
                    <?= $form->field($model, 'red_id_FK', [
                        'labelOptions'=>['class'=>'estilo-programa-red input-group mx-0'],
                        'errorOptions'=>['class'=>'custom-error']
                    ])->dropDownList(
                        \app\models\Red::find()->select(['nombre_red','red_id'])->indexBy('red_id')->column(),
                        [
                            'prompt'=>'Seleccione una red',
                            'style'=>'width: 45vw; height: 5vh; font-size: 14px; font-family: Work-sans, sans-serif;',
                        ]
                    )?>
                </div>
                <?= $form->field($model, 'fecha_creacion')->hiddenInput()->label(false)?>
            </div>
    <br><br>
    <div class="form-group d-flex flex-row justify-content-end" style="height: 5vh; margin-left: 15vw;">
        <?= Html::submitButton('Crear', ['class'=> 'btn-crear-red col-12 col-sm-12','style' => 'background: #39A900; width: 6vw; height: 5vh; font-size: 20px;  margin-top: 3vh;']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <script>
    document.getElementById('nivel_formacion').addEventListener('input', function() {
        var nivelFormacion = this.value.toLowerCase().trim();
        var mesesInput = document.getElementById('meses');

        // Condiciones para los diferentes niveles de formación
        if (nivelFormacion === 'tecnica' || nivelFormacion === 'técnica') {
            mesesInput.value = 24; // Ejemplo: 24 meses para nivel técnico
        } else if (nivelFormacion === 'tecnologia' || nivelFormacion === 'tecnología') {
            mesesInput.value = 36; // Ejemplo: 36 meses para nivel tecnológico
        } else {
            mesesInput.value = ''; // Dejar vacío si no hay coincidencia
        }
    });
</script>
</div>