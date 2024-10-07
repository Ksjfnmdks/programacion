<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\ResultadoSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="resultado-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_res') ?>

    <?= $form->field($model, 'nombre') ?>

    <?= $form->field($model, 'horas') ?>

    <?= $form->field($model, 'fecha_creacion') ?>

    <?= $form->field($model, 'id_com_fk') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
