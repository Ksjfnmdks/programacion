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

// Mostrar mensaje flash si está configurado
if (Yii::$app->session->hasFlash('success')): ?>
    <div class="alert alert-success">
        <?= Yii::$app->session->getFlash('success') ?>
    </div>
<?php endif; ?>

<div class="containerUsu">
    <div class="titulo">
        <h1>Actualizar Perfil</h1>
    </div>
    <br>
    <hr class="divider">
    <br>

    <div class="UsuariosForm">
    <?php $form = ActiveForm::begin(); ?>
    <div class="form-grid">

        <?= $form->field($model, 'identificacion', [
            'errorOptions' => ['class' => 'custom-error']
        ])->textInput([
            'maxlength' => 10, 
            'placeholder' => 'Identificación',
            'readonly' => true,
            'oninput' => "this.value = this.value.replace(/[^0-9]/g, '')"
        ]) ?>

        <?= $form->field($model, 'nombre', [
            'errorOptions' => ['class' => 'custom-error']
        ])->textInput([
            'maxlength' => 30, 
            'placeholder' => 'Nombres',
            'readonly' => true, 
            'oninput' => "this.value = this.value.replace(/[^a-zA-ZáéíóúÁÉÍÓÚñÑ\s]/g, '')"
        ]) ?>

        <?= $form->field($model, 'apellido', [
            'errorOptions' => ['class' => 'custom-error']
        ])->textInput([
            'maxlength' => 30, 
            'placeholder' => 'Apellidos',
            'readonly' => true, 
            'oninput' => "this.value = this.value.replace(/[^a-zA-ZáéíóúÁÉÍÓÚñÑ\s]/g, '')"
        ]) ?>

        <?= $form->field($model, 'telefono', [
            'errorOptions' => ['class' => 'custom-error']
        ])->textInput([
            'maxlength' => 10, 
            'placeholder' => 'Teléfono',
            'oninput' => "this.value = this.value.replace(/[^0-9]/g, '')"
        ]) ?>

        <?= $form->field($model, 'correo', [
            'errorOptions' => ['class' => 'custom-error']
        ])->input('email', [
            'maxlength' => 100, 
            'placeholder' => 'Correo Electrónico'
        ]) ?>

        <?= $form->field($model, 'username', [
            'errorOptions' => ['class' => 'custom-error']
        ])->textInput([
            'maxlength' => 30, 
            'placeholder' => 'Usuario',
            'readonly' => true, 
        ]) ?>

        <?= $form->field($model, 'password', [
            'errorOptions' => ['class' => 'custom-error']
        ])->passwordInput([
            'maxlength' => 50, 
            'placeholder' => 'Contraseña'
        ]) ?>

        <?= $form->field($model, 'rol_id_FK', [
            'errorOptions' => ['class' => 'custom-error']
        ])->dropDownList(
            ArrayHelper::map(Roles::find()->all(), 'rol_id', 'nombre'), 
            ['prompt' => 'Seleccione un Rol', 'disabled' => true]
        ) ?>

        <?= $form->field($model, 'est_id_FK', [
            'errorOptions' => ['class' => 'custom-error']
        ])->dropDownList(
            ArrayHelper::map(Estados::find()->all(), 'est_id', 'descripcion'), 
            ['prompt' => 'Seleccione un Estado', 'disabled' => true] 
        ) ?>
    </div>
    <div class="boton">
        <?= Html::submitButton('Actualizar', ['class' => 'btn-registrar']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
</div>
