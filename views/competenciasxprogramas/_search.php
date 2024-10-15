<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\CompetenciasxprogramasSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="competenciasxprogramas-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_rel') ?>

    <?= $form->field($model, 'id_pro_fk') ?>

    <?= $form->field($model, 'id_com_fk') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
