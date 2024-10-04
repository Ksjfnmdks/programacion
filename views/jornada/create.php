<?php
use yii\helpers\Html;
/** @var yii\web\View $this */
/** @var app\models\Ambiente $model */ 
$this->registerCssFile("@web/css/jornadasForm.css", ['depends' => [yii\web\YiiAsset::className()]]);
?>
<div  class="CentrarTit">
<h1>Crear Ambiente</h1>
</div>
<hr class="divider">
<br>
<div class="create-ambientes-container">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="lista">
        <?= Html::a(
            Html::img('@web/img/icons/icon-crear-selecionado.png', ['class' => 'iconosa']) . ' Crear Jornada', 
            '#',
            ['class' => 'listaususelected']
        ) ?>        
        <?= Html::a(
            Html::img('@web/img/icons/icon-lista.png', ['class' => 'iconosa']) . ' Lista de jornada', 
            ['jornada/index'], 
            ['class' => 'listausu']
        ) ?>
    </div>

    <div class="form-wrapper">
        <?= $this->render('_form', ['model' => $model]) ?>
    </div>
</div>






