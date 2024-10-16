<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Resultado $model */

$this->title = 'Crear Resultado';
$this->params['breadcrumbs'][] = ['label' => 'Resultados', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="resultado-create">

<div class="text-center">
    <h1 style="border-bottom: 2px solid grey; display: inline-block; width: 600px"><?= Html::encode($this->title) ?></h1>
</div>


<?= $this->render('_form', [
    'model' => $model,
    'competencias' => $competencias,
]) ?>

</div>

