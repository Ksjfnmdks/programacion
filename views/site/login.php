<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Iniciar Sesión';
?>

<div class="login-container">
    <div class="login-form-wrapper">
        <h1 class="h1"><?= Html::encode($this->title) ?></h1>

        <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

        <!-- Campo de Usuario -->
        <div class="input-group">
            <?= $form->field($model, 'username', [
                'options' => ['class' => 'field-wrapper'] 
            ])->textInput([
                'class' => 'form-control custom-input', 
                'placeholder' => 'Usuario', 
                'autofocus' => true
            ])->label(false) 
            ?>
        </div>

        <!-- Campo de Contraseña -->
        <div class="input-group">
            <?= $form->field($model, 'password', [
                'options' => ['class' => 'field-wrapper'] 
            ])->passwordInput([
                'class' => 'form-control custom-input',
                'placeholder' => 'Contraseña' 
            ])->label(false) 
            ?>
        </div>

        <!-- Enlace para recuperar contraseña -->
        <div class="forgot-password">
            <?= Html::a('Forgot password?', ['site/request-password-reset']) ?>
        </div>

        <!-- Botón de Envío -->
        <div class="form-group">
            <?= Html::submitButton('Iniciar Sesión', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
