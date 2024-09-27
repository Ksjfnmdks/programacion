<?php

use app\models\Usuarios;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\UsuarioSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Usuarios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuarios-index">

    <h1><?= Html::encode($this->title) ?></h1>
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
    

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'usu_id',
            'identificacion',
            'nombre',
            'apellido',
            'telefono',
            //'correo',
            //'username',
            //'password',
            //'fecha_creacion',
            //'rol_id_FK',
            //'est_id_FK',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Usuarios $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'usu_id' => $model->usu_id]);
                 }
            ],
        ],
    ]); ?>


</div>
