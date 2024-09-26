<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Red $model */

$this->title = 'Create Red';
$this->params['breadcrumbs'][] = ['label' => 'Reds', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="red-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
