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

<div class="containerUsu">
    <?php if (Yii::$app->session->hasFlash('success')): ?>
        <div class="alert alert-success">
            <?= Yii::$app->session->getFlash('success') ?>
        </div>
    <?php endif; ?>

    <div class="titulo">
        <h1>Usuarios</h1>
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
            <div class="titulo2">
                <h2>Crear Usuario</h2>
            </div>
            <hr class="divider2">
        <div class="form-grid">
            
            <?= $form->field($model, 'identificacion')->textInput(['maxlength' => true, 'placeholder' => 'Identificación']) ?>

            <?= $form->field($model, 'nombre')->textInput(['maxlength' => true, 'placeholder' => 'Nombres']) ?>

            <?= $form->field($model, 'apellido')->textInput(['maxlength' => true, 'placeholder' => 'Apellidos']) ?>

            <?= $form->field($model, 'telefono')->textInput(['maxlength' => true, 'placeholder' => 'Teléfono']) ?>

            <?= $form->field($model, 'correo')->input('email', ['placeholder' => 'Correo Electrónico']) ?>

            <?= $form->field($model, 'username')->textInput(['maxlength' => true, 'placeholder' => 'Usuario']) ?>

            <?= $form->field($model, 'password')->passwordInput(['maxlength' => true, 'placeholder' => 'Contraseña']) ?>

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
