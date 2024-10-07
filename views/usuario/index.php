<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\web\View;
use yii\helpers\Url;


$this->title = 'Lista de Usuarios';

$this->registerCssFile('@web/css/tablas.css', ['depends' => [yii\web\YiiAsset::class]]);
?>

<style>
    .header1{
        height: 6vh;
        text-decoration: none;
        background: #39A900;
        color: white;
        pointer-events: none;
        cursor: default;
    }
    .paginador{
        color: white;
        width: 60vw;
        display: flex;
        justify-self: center;
        justify-content: center;
    }
    .paginador1{
        
        color: white;
        width: 50px;
    }
</style>
<link href='https://fonts.googleapis.com/css?family=Work Sans' rel='stylesheet'>
<div class="Contabla">
    <h2><?= Html::encode($this->title) ?></h2>
    <hr class="divider">
    <div class="lista">
            <?= Html::a(
                Html::img('@web/img/icons/icon-crear.png', ['class' => 'iconosa']) . ' Crear Usuario', 
                ['usuario/create'], 
                ['class' => 'listausu']
            ) ?>
        <?= Html::a(
            Html::img('@web/img/icons/icon-lista-selecionada.png', ['class' => 'iconosa']) . ' Lista de Usuarios', 
            ['usuario/index'], 
            ['class' => 'listaususelected']
        ) ?>
    </div>
    <div class="table-container">
    

        <div class="BuscarUsu">
        
            <?php $form = ActiveForm::begin([
                'action' => ['index'],
                'method' => 'get',
            ]); ?>
            
            <?= $form->field($searchModel, 'identificacion')->textInput(['placeholder' => 'Buscar por identificación'])->label(false) ?>



            <?php ActiveForm::end(); ?>
        </div>
        
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'options' => ['class' => 'table table-striped'],
            'summary' => 'Mostrando  {begin}  - {end}  de {totalCount} Usuarios.',      
            'pager' => [
                'options' => ['class' => 'pagination justify-content-center'],
                'linkOptions' => ['class' => 'page-link'],
                'pageCssClass' => 'page-item',
            ],
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                [
                   'attribute' => 'identificacion',
                    'enableSorting' => false,
                ],
                [
                    'attribute' => 'nombre',
                     'enableSorting' => false,
                ],
                [
                    'attribute' => 'apellido',
                     'enableSorting' => false,
                 ],
                 [
                    'attribute' => 'telefono',
                     'enableSorting' => false,
                 ],
                 [
                    'attribute' => 'correo',
                     'enableSorting' => false,
                 ],
                [
                    'attribute' => 'rol_id_FK',
                    'value' => 'rolIdFK.nombre',
                    'enableSorting' => false,
                ],
                [
                    'attribute' => 'est_id_FK',
                    'value' => 'estIdFK.descripcion',
                    'enableSorting' => false,
                ],
                [
                    'class' => 'yii\grid\ActionColumn',
                    'header' => 'Acciones',
                    'urlCreator' => function ($action, $model, $key, $index) {
                        return Url::to([$action, 'id' => $model->usu_id]);
                    },
                ],
            ],
            'headerRowOptions' => ['class' => 'header1'], 
        ]); 
        ?>
    </div>
</div>

