<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Resultado $model */

$this->title = 'Actualizar Resultado: ' . $model->id_res;
$this->params['breadcrumbs'][] = ['label' => 'Resultados', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_res, 'url' => ['view', 'id_res' => $model->id_res]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="resultado-update">

<div class="text-center">
    <h1 style="border-bottom: 2px solid grey; display: inline-block; width: 600px"><?= Html::encode($this->title) ?></h1>
</div>

    <?= $this->render('_form', [
        'model' => $model,
        'competencias' => $competencias,
    ]) ?>

</div>
