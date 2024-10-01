<?php
use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Tblusuarios */

$this->registerCssFile("@web/css/UsuariosForm.css", ['depends' => [yii\web\YiiAsset::className()]]);

$this->title = $model->nombre . ' ' . $model->apellido;
$this->params['breadcrumbs'][] = ['label' => 'Lista de Personas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>


    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Actualizar', ['update', 'id' => $model->usu_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Eliminar', ['delete', 'id' => $model->usu_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '¿Estás seguro de que deseas eliminar a esta persona?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <div class="UsuariosForm">
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'usu_id',
            'identificacion',
            'nombre',
            'apellido',
            'telefono',
            'correo',
            'username',
            [
                'attribute' => 'rol_id_FK',
                'value' => $model->rolIdFK->nombre, // Mostrar nombre del rol
            ],
            [
                'attribute' => 'est_id_FK',
                'value' => $model->estIdFK->descripcion, // Mostrar descripción del estado
            ],
            'fecha_creacion',
        ],
    ]) ?>

</div>
