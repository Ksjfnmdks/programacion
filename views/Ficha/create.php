<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\TblFichas $model */

$this->title = 'Create Tbl Fichas';
$this->params['breadcrumbs'][] = ['label' => 'Tbl Fichas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbl-fichas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
