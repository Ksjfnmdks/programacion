<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\TblRoles;
use app\models\TblEstados;

/* @var $this yii\web\View */
/* @var $model app\models\Usuarios */
/* @var $form yii\widgets\ActiveForm */


$this->registerCssFile("@web/css/UsuariosForm.css", ['depends' => [yii\web\YiiAsset::className()]]);

?>

<div class="">
    <div class="lista">
        <?= Html::a(
            Html::img('@web/img/icons/icon-lista.png', ['class' => 'iconosa']) . ' Lista de Usuarios', 
            ['usuario/index'], 
            ['class' => 'listausu']
        ) ?>
    </div>
    <hr class="divider">
    <div class="titulo">
        <h1>Actualizar Usuario</h1>
    </div>

    <div class="UsuariosForm">

        <?php $form = ActiveForm::begin(); ?>

        <div class="form-grid">
            <?= $form->field($model, 'identificacion')->textInput(['maxlength' => true, 'placeholder' => 'Identificación']) ?>

            <?= $form->field($model, 'nombre')->textInput(['maxlength' => true, 'placeholder' => 'Nombres']) ?>

            <?= $form->field($model, 'apellido')->textInput(['maxlength' => true, 'placeholder' => 'Apellidos']) ?>

            <?= $form->field($model, 'telefono')->textInput(['maxlength' => true, 'placeholder' => 'Teléfono']) ?>

            <?= $form->field($model, 'correo')->input('email', ['placeholder' => 'Correo Electrónico']) ?>

            <?= $form->field($model, 'username')->textInput(['maxlength' => true, 'placeholder' => 'Usuario']) ?>

            <?= $form->field($model, 'password')->passwordInput(['maxlength' => true, 'placeholder' => 'Contraseña']) ?>

            <?= $form->field($model, 'rol_id_FK')->dropDownList(
                ArrayHelper::map(TblRoles::find()->all(), 'rol_id', 'nombre'), 
                ['prompt' => 'Seleccione un Rol']
            ) ?>

            <?= $form->field($model, 'est_id_FK')->dropDownList(
                ArrayHelper::map(TblEstados::find()->all(), 'est_id', 'descripcion'), 
                ['prompt' => 'Seleccione un Estado']
            ) ?>

        </div>
    </div>
    
    <div class="boton">
        <?= Html::submitButton('Actualizar', ['class' => 'btn-registrar']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
