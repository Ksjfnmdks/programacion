<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\helpers\Url;


$this->title = 'Lista de Instructores';

$this->registerCssFile('@web/css/tablaUsu.css', ['depends' => [yii\web\YiiAsset::class]]);
?>

<div class="Contabla">
    <h2><?= Html::encode($this->title) ?></h2>
    <hr class="divider">
    <div class="table-container">
        <div class="BuscarUsu">
            <?php $form = ActiveForm::begin([
                'action' => ['site/admin'],
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
