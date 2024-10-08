<?php

use app\models\Ambientes;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\AmbienteSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Lista de Ambientes';
$this->registerCssFile('@web/css/tablas.css', ['depends' => [yii\web\YiiAsset::class]]);

$this->registerCss("
    .header1 {
        height: 6vh;
        text-decoration: none;
        background: #39A900;
        color: white;
        pointer-events: none;
        cursor: default;
    }
    .paginador {
        color: white;
        width: 60vw;
        display: flex;
        justify-content: center;
    }
    .paginador1 {
        color: white;
        width: 50px;
    }
    .table-container {
        margin-top: 30px;
        
    }

    .BuscarAmb {
        margin-bottom: 20px;
        width: 200px;
        
        
    }


    }
    .iconosa {
        width: 20px;
        margin-right: 10px;
    }
    h1 {
        color: #39A900;
    }
    .table {
        border: 1px solid #ddd;
        border-radius: 5px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    .container2{
    margin-top: 30px;
    display: flex;
    justify-content: flex-end; 
    align-items: center; 
    }


");

?>

<div class="ambiente-index">

  <br>

    <div class="div text-center">
    <h1><?= Html::encode($this->title) ?></h1>

    </div>

   

    <hr class="divider">

    <div class="lista">
            <?= Html::a(
                Html::img('@web/img/icons/icon-crear.png', ['class' => 'iconosa']) . ' Crear Ambiente', 
                ['ambiente/create'], 
                ['class' => 'listausu']
            ) ?>
        <?= Html::a(
            Html::img('@web/img/icons/icon-lista-selecionada.png', ['class' => 'iconosa']) . ' Lista de Ambiente', 
            ['ambiente/index'], 
            ['class' => 'listaususelected']
        ) ?>
    </div>

    <div class="table-container">

        <div class="container2">
            <div class="BuscarAmb">
                <?php $form = ActiveForm::begin([
                    'action' => ['index'],
                    'method' => 'get',
                ]); ?>

                <?= $form->field($searchModel, 'nombre_ambiente')->textInput(['placeholder' => 'Buscar por nombre de ambiente'])->label(false) ?>

                <?php ActiveForm::end(); ?>
            </div>
        </div>
        

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'options' => ['class' => 'table table-striped'],
            'summary' => 'Mostrando  {begin}  - {end}  de {totalCount} Ambientes.',
            'pager' => [
                'options' => ['class' => 'pagination justify-content-center'],
                'linkOptions' => ['class' => 'page-link'],
                'pageCssClass' => 'page-item',
            ],
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'amb_id',
                'nombre_ambiente',
                'capacidad',
                'estado',
                'recursos:ntext',
                'nombre_red',
                'fecha_creacion',
                [
                    'class' => ActionColumn::className(),
                    'urlCreator' => function ($action, Ambientes $model, $key, $index, $column) {
                        return Url::toRoute([$action, 'amb_id' => $model->amb_id]);
                    },
                ],
            ],
            'headerRowOptions' => ['class' => 'header1'], 
        ]); ?>
        
    </div>

</div>
