<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\web\View;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsuarioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lista de Usuarios';
$this->params['breadcrumbs'][] = $this->title;


$this->registerCssFile('@web/css/tablaUsu.css', ['depends' => [yii\web\YiiAsset::class]]);
?>


<div class="">
    <div class="lista">
    <?= Html::a(
            Html::img('@web/icon-crear.png', ['class' => 'iconosa']) . ' Crear Usuario', 
            ['usuario/create'], 
            ['class' => 'listausu']
        ) ?>
        <?= Html::a(
            Html::img('@web/icon-lista-selecionada.png', ['class' => 'iconosa']) . ' Lista de Usuarios', 
            ['usuario/index'], 
            ['class' => 'listaususelected']
        ) ?>
    </div>
    <hr class="divider">
    <div class="table-container">
    <h2><?= Html::encode($this->title) ?></h2>
        <div class="usuario-search">
            <?php $form = ActiveForm::begin([
                'action' => ['index'],
                'method' => 'get',
            ]); ?>

            <?= $form->field($searchModel, 'identificacion')->textInput(['placeholder' => 'Buscar por identificación'])->label(false) ?>

            <div class="form-group">
                <?= Html::submitButton('Buscar', ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Reiniciar', ['index'], ['class' => 'btn btn-outline-secondary']) ?>
            </div>

            <?php ActiveForm::end(); ?>
        </div>

    <!-- Tabla de usuarios -->
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'usu_id',
                'identificacion',
                'nombre',
                'apellido',
                'telefono',
                'correo',
                'username',
                'fecha_creacion',
                [
                    'attribute' => 'rol_id_FK',
                    'value' => 'rolIdFK.nombre',
                ],
                [
                    'attribute' => 'est_id_FK',
                    'value' => 'estIdFK.descripcion', 
                ],

                ['class' => 'yii\grid\ActionColumn',
                    'header' => 'Acciones',
                    'urlCreator' => function ($action, $model, $key, $index) {
                        return Url::to([$action, 'usu_id' => $model->usu_id]);
                    },
                ],
                
            ],
        ]); ?>
    </div>
</div>
