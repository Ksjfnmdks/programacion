<?php

use app\models\TblFichas;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\FichaSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Lista de fichas';

$this->registerCssFile('@web/css/tablas.css', ['depends' => [yii\web\YiiAsset::class]]);

?>
<div class="Contabla">
    <div class="lista">
        <?= Html::a(
                Html::img('@web/img/icons/icon-crear.png', ['class' => 'iconosa']) . ' Crear ficha', 
                ['ficha/create'], 
                ['class' => 'listausu']
            ) ?>
        <?= Html::a(
            Html::img('@web/img/icons/icon-lista-selecionada.png', ['class' => 'iconosa']) . ' Lista de fichas', 
            ['ficha/index'], 
            ['class' => 'listaususelected']
        ) ?>
    </div>
    <hr class="divider">
    <h2><?= Html::encode($this->title) ?></h2>
    <div class="table-container">

        <div class="BuscarUsu">
            <?php $form = ActiveForm::begin([
                'action' => ['index'],
                'method' => 'get',
            ]); ?>
            
            <?= $form->field($searchModel, 'codigo')->textInput(['placeholder' => 'Buscar por código'])->label(false) ?>
            <?php ActiveForm::end(); ?>
        </div>
    
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'tableOptions' => ['class' => 'table'], 
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'codigo',
                'fecha_incio',
                'fecha_final',
                [
                    'attribute' => 'pro_id_FK',
                    'value' => 'proIdFK.nombre_programa',
                ],
                'instructor_lider',
                [
                    'attribute' => 'jor_id_FK',
                    'value' => 'jorIdFK.descripcion',
                ],
                'fecha_creacion',
                [
                    'class' => 'yii\grid\ActionColumn',
                    'header' => 'Acciones',
                    'urlCreator' => function ($action, $model, $key, $index) {
                        return Url::to([$action, 'fic_id' => $model->fic_id]);
                    },
                ],
            ],
        
        ]); ?>
    </div>
</div>
