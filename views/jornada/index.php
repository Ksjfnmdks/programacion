<?php

use app\models\Jornadas;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\JornadaSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */


$this->title = 'Lista de Jornadas';

$this->registerCssFile('@web/css/tablas.css', ['depends' => [yii\web\YiiAsset::class]]);
?>
<link href='https://fonts.googleapis.com/css?family=Work Sans' rel='stylesheet'>
<div class="Contabla">
    <h2><?= Html::encode($this->title) ?></h2>
    <hr class="divider">
    <div class="lista">
            <?= Html::a(
                Html::img('@web/img/icons/icon-crear.png', ['class' => 'iconosa']) . ' Crear Jornada', 
                ['jornada/create'], 
                ['class' => 'listausu']
            ) ?>
        <?= Html::a(
            Html::img('@web/img/icons/icon-lista-selecionada.png', ['class' => 'iconosa']) . ' Lista de Jornadas', 
            ['jornada/index'], 
            ['class' => 'listaususelected']
        ) ?>
    </div>
    <div class="table-container">
    

        <div class="BuscarUsu">
        
            <?php $form = ActiveForm::begin([
                'action' => ['index'],
                'method' => 'get',
            ]); ?>
            
            <?= $form->field($searchModel, 'descripcion')->textInput(['placeholder' => 'Buscar por nombre'])->label(false) ?>



            <?php ActiveForm::end(); ?>
        </div>
        
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'descripcion',
                    'hora_inicio',
                    'hora_fin',
                    'fecha_creacion',
                    [
                        'class' => ActionColumn::className(),
                        'header'=>'acciones',
                        'urlCreator' => function ($action, Jornadas $model, $key, $index, $column) {
                            return Url::toRoute([$action, 'jor_id' => $model->jor_id]);
                        }
                    ],
                ],
                'tableOptions' => ['class' => 'table table-striped table-bordered my-custom-class'],
                'emptyText' => 'No se encontraron jornadas.', // Personaliza aquí el texto
                'summary' => '',
            ]); ?>
    </div>
</div>




<?php

