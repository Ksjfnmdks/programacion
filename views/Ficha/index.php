<?php

use app\models\Fichas;
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
$this->registerCssFile("@web/css/UsuariosForm.css", ['depends' => [yii\web\YiiAsset::className()]]);
$this->registerCssFile("@web/css/ficha.css", ['depends' => [yii\web\YiiAsset::className()]]);
$this->registerCssFile('@web/css/tablas.css', ['depends' => [yii\web\YiiAsset::class]]);
// Añadimos el CSS personalizado para aumentar el tamaño de la fuente de la tabla
$this->registerCss("
    .table td, .table th {
        font-size: 19px; /* Aumenta el tamaño de la fuente a 20px */
    }
");
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
            'options' => ['class' => 'table table-striped'],
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'codigo',
                'fecha_incio',
                [
                    'attribute' => 'programa',
                    'value' => 'proIdFK.nombre_programa',
                ],
                [
                    'attribute' => 'duracion meses',
                    'value' => 'proIdFK.tiempo_formacion',
                ],
                'fecha_final',
                'instructor_lider',
                [
                    'attribute' => 'jornada',
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
