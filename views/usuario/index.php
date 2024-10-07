<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\web\View;
use yii\helpers\Url;


$this->title = 'Lista de Usuarios';

$this->registerCssFile('@web/css/tablas.css', ['depends' => [yii\web\YiiAsset::class]]);
?>
<link href='https://fonts.googleapis.com/css?family=Work Sans' rel='stylesheet'>
<div class="Contabla">
    <h2 class="tituloh2"><?= Html::encode($this->title) ?></h2>
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
            'tableOptions' => ['class' => 'table'],
            'options' => ['class' => 'table table-striped'],
            'summary' => 'Mostrando  {begin}  - {end}  de {totalCount} Usuarios.', //se agrega el paginador        
            'pager' => [
                'options' => ['class' => 'pagination justify-content-center'], // centrar el paginador
                'linkOptions' => ['class' => 'page-link'], // estilo para cada enlace del paginador
                'pageCssClass' => 'page-item', // clase para el contenedor de cada página
            ],
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
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

