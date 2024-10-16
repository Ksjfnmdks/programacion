<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\CompetenciasModel $model */

$this->title = 'Actualizar Competencia: ' . $model->id_com;
$this->params['breadcrumbs'][] = ['label' => ' Actualizar Competencia', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_com, 'url' => ['view', 'id_com' => $model->id_com]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="competencias-model-update">

<div class="text-center">
    <h1 style="border-bottom: 2px solid grey; display: inline-block; width: 600px"><?= Html::encode($this->title) ?></h1>
</div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
