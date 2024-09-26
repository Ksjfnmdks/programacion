<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Usuarios $model */
/** @var yii\widgets\ActiveForm $form */


$this->title = 'Actualizar Usuarios';
?>
<div class="usuario">
    <h1><?= Html::encode($this->title) ?></h1>
</div>

<div class="divider col-md-10"></div>

<div class="lista">
    <?= Html::a('<img src="icon-lista.png" class="icon"> Lista de Usuarios', ['index'], ['class' => 'listausu']) ?>
</div>

<div class="col-11">
    <div class="containerUsu col-11">
        <?php $form = ActiveForm::begin([
            'options' => ['class' => 'user-form'],
        ]); ?>

        <h2>Actualizar Usuario</h2>

        <div class="form-grid">
            <div class="form-group1">
                <?= $form->field($model, 'identificacion')->textInput(['placeholder' => 'Identificación']) ?>
            </div>
            <div class="form-group1">
                <?= $form->field($model, 'nombre')->textInput(['placeholder' => 'Nombres']) ?>
            </div>
            <div class="form-group1">
                <?= $form->field($model, 'apellido')->textInput(['placeholder' => 'Apellidos']) ?>
            </div>
            <div class="form-group1">
                <?= $form->field($model, 'telefono')->textInput(['placeholder' => 'Teléfono']) ?>
            </div>
            <div class="form-group1">
                <?= $form->field($model, 'correo')->textInput(['type' => 'email', 'placeholder' => 'Correo Electrónico']) ?>
            </div>
            <div class="form-group1">
                <?= $form->field($model, 'username')->textInput(['placeholder' => 'Usuario']) ?>
            </div>
            <div class="form-group1">
                <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Contraseña', 'value' => '']) ?> <!-- Optional clear for password -->
            </div>
            <div class="form-group1">
                <?= $form->field($model, 'rol_id_FK')->dropDownList(
                    ['1' => 'Administrador', '2' => 'Instructor', '3' => 'Usuario'],
                    ['prompt' => 'Seleccione un rol']
                ) ?>
            </div>
            <div class="form-group1">
                <?= $form->field($model, 'est_id_FK')->dropDownList(
                    ['1' => 'Activo', '2' => 'Inactivo'],
                    ['prompt' => 'Seleccione un estado']
                ) ?>
            </div>
            <div class="form-group1">
                <?= $form->field($model, 'fecha_creacion')->input('date') ?>
            </div>
        </div>

        <div class="boton">
            <?= Html::submitButton('Actualizar', ['class' => 'btn-registrar']) ?>
        </div>

        <?php ActiveForm::end(); ?>
    </div>
</div>
