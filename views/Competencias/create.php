<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\CompetenciasModel $model */

$this->title = 'Crear Competencia';
$this->params['breadcrumbs'][] = ['label' => 'Crear Competencias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="competencias-model-create">

<div class="text-center">
    <h1 style="border-bottom: 2px solid grey; display: inline-block; width: 600px"><?= Html::encode($this->title) ?></h1>
</div>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
