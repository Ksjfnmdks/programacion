<?php
use app\models\TblFicha;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\FichasSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Lista De Fichas';
$this->registerCssFile("@web/css/UsuariosForm.css", ['depends' => [yii\web\YiiAsset::className()]]);
$this->registerCssFile("@web/css/ficha.css", ['depends' => [yii\web\YiiAsset::className()]]);
$this->registerCssFile('@web/css/tablas.css', ['depends' => [yii\web\YiiAsset::class]]);

// Añadimos el CSS personalizado para aumentar el tamaño de la fuente de la tabla y el color del texto
$this->registerCss("
    .table td, .table th {
        font-size: 19px; /* Aumenta el tamaño de la fuente a 19px */
        color: black; /* Cambiar color del texto a negro */
    }
    .action-column a {
        color: #38A800; /* Cambiar color de los enlaces en la columna de acciones a verde */
    }
    .action-column a:hover {
        color: #2d6a27; /* Color verde más oscuro al pasar el cursor */
    }
");
?>

<div class="Contabla">
    <div class="lista">
        <?= Html::a(
                Html::img('@web/img/icons/icon-crear.png', ['class' => 'iconosa']) . ' Crear ficha', 
                ['fichas/create'], 
                ['class' => 'listausu']
            ) ?>
        <?= Html::a(
            Html::img('@web/img/icons/icon-lista-selecionada.png', ['class' => 'iconosa']) . ' Lista de fichas', 
            ['fichas/index'], 
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
                [
                    'attribute' => 'codigo',
                    'enableSorting' => false,
                    'headerOptions' => ['style' => 'background-color: #38A800; color: #fff; font-weight: bold;'],
                ],
                [
                    'attribute' => 'fecha_incio',
                    'enableSorting' => false,
                    'headerOptions' => ['style' => 'background-color: #38A800; color: #fff; font-weight: bold;'],
                ],
                [
                    'attribute' => 'programa',
                    'value' => 'proIdFK.nombre_programa',
                    'headerOptions' => ['style' => 'background-color: #38A800; color: #fff; font-weight: bold;'],
                ],
                [
                    'attribute' => 'duracion programa',
                    'value' => function($model) {
                        return $model->proIdFK->meses . ' meses'; // Concatenar "meses"
                    },
                    'headerOptions' => ['style' => 'background-color: #38A800; color: #fff; font-weight: bold;'],
                ],
                [
                    'attribute' => 'fecha_final',
                    'enableSorting' => false,
                    'headerOptions' => ['style' => 'background-color: #38A800; color: #fff; font-weight: bold;'],
                ],
                [
                    'attribute' => 'Instructor lider',
                    'value' => 'usu.nombre',
                    'headerOptions' => ['style' => 'background-color: #38A800; color: #fff; font-weight: bold;'],
                ],
                [
                    'attribute' => 'jornada',
                    'value' => 'jorIdFK.descripcion',
                    'headerOptions' => ['style' => 'background-color: #38A800; color: #fff; font-weight: bold;'],
                ],
                [
                    'attribute' => 'fecha_creacion',
                    'enableSorting' => false,
                    'headerOptions' => ['style' => 'background-color: #38A800; color: #fff; font-weight: bold;'],
                ],
                [
                    'class' => ActionColumn::class,
                    'header' => 'Acciones',
                    'headerOptions' => ['style' => 'background-color: #38A800; color: #fff; font-weight: bold;'],
                    'urlCreator' => function ($action, $model, $key, $index) {
                        return Url::to([$action, 'fic_id' => $model->fic_id]);
                    },
                    'template' => '{update} {delete}', // Se muestran solo "actualizar" y "eliminar"
                ],
            ],
        ]); ?>
    </div>
</div>
