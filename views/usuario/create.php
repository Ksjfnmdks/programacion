<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Roles;
use app\models\Estados;

/* @var $this yii\web\View */
/* @var $model app\models\Usuarios */
/* @var $form yii\widgets\ActiveForm */


$this->registerCssFile("@web/css/UsuariosForm.css", ['depends' => [yii\web\YiiAsset::className()]]);
?>
<link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="UsuariosForm.css">

<div class="containerUsu">
    
    <?php if (Yii::$app->session->hasFlash('success')): ?>
        <div class="alert alert-success">
            <?= Yii::$app->session->getFlash('success') ?>
        </div>
    <?php endif; ?>

    <div class="titulo">
        <h1>Crear Usuario</h1>
    </div>
    <hr class="divider">
    <div class="lista">
        <?= Html::a(
            Html::img('@web/img/icons/icon-crear-selecionado.png', ['class' => 'iconosa']) . ' Crear Usuario', 
            '#',
            ['class' => 'listaususelected']
        ) ?>        
        <?= Html::a(
            Html::img('@web/img/icons/icon-lista.png', ['class' => 'iconosa']) . ' Lista de Usuarios', 
            ['usuario/index'], 
            ['class' => 'listausu']
        ) ?>
    </div>
    
    <div class="UsuariosForm">

        <?php $form = ActiveForm::begin(); ?>

        <div class="form-grid">

            <?= $form->field($model, 'identificacion')->textInput(['maxlength' => 10, 'placeholder' => 'Identificación', 'oninput' => "this.value = this.value.replace(/[^0-9]/g, '')"]) //oninput para que solo acepte numeros en este campo?> 

            <?= $form->field($model, 'nombre')->textInput(['maxlength' => 30, 'placeholder' => 'Nombres', 'oninput' => "this.value = this.value.replace(/[^a-zA-ZáéíóúÁÉÍÓÚñÑ\s]/g, '')"]) //oninput para que solo acepte letras en este campo?>

            <?= $form->field($model, 'apellido')->textInput(['maxlength' => 30, 'placeholder' => 'Apellidos', 'oninput' => "this.value = this.value.replace(/[^a-zA-ZáéíóúÁÉÍÓÚñÑ\s]/g, '')"]) ?>

            <?= $form->field($model, 'telefono')->textInput(['maxlength' => 10, 'placeholder' => 'Teléfono', 'oninput' => "this.value = this.value.replace(/[^0-9]/g, '')"]) ?>

            <?= $form->field($model, 'correo')->input('email', ['maxlength' => 100,'placeholder' => 'Correo Electrónico']) ?>

            <?= $form->field($model, 'username')->textInput(['maxlength' => 30, 'placeholder' => 'Usuario']) ?>

            <?= $form->field($model, 'password')->passwordInput(['maxlength' => 50, 'placeholder' => 'Contraseña']) ?>

            <?= $form->field($model, 'rol_id_FK')->dropDownList(
                ArrayHelper::map(Roles::find()->all(), 'rol_id', 'nombre'), 
                ['prompt' => 'Seleccione un Rol']
            ) ?>

            <?= $form->field($model, 'est_id_FK')->dropDownList(
                ArrayHelper::map(Estados::find()->all(), 'est_id', 'descripcion'), 
                ['prompt' => 'Seleccione un Estado']
            ) ?>

        </div>
    </div>
    
        <div class="boton">
            <?= Html::submitButton('Registrar', ['class' => 'btn-registrar']) ?>
        </div>

        <?php ActiveForm::end(); ?>
</div>
