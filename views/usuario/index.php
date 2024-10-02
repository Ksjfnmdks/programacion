<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\web\View;
use yii\helpers\Url;


$this->title = 'Lista de Usuarios';

$this->registerCssFile('@web/css/tablas.css', ['depends' => [yii\web\YiiAsset::class]]);
?>

<div class="Contabla">
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
    <hr class="divider">
    <h2><?= Html::encode($this->title) ?></h2>
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
            'tableOptions' => ['class' => 'table'], 
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'usu_id',
                'identificacion',
                'nombre',
                'apellido',
                'telefono',
                'correo',
                [
                    'attribute' => 'rol_id_FK',
                    'value' => 'rolIdFK.nombre',
                ],
                [
                    'attribute' => 'est_id_FK',
                    'value' => 'estIdFK.descripcion',
                ],
                [
                    'class' => 'yii\grid\ActionColumn',
                    'header' => 'Acciones',
                    'urlCreator' => function ($action, $model, $key, $index) {
                        return Url::to([$action, 'usu_id' => $model->usu_id]);
                    },
                ],
            ],
        ]); ?>
    </div>
</div>
