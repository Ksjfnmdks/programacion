<?php
use app\models\Ficha;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\LinkPager;


/** @var yii\web\View $this */
/** @var app\models\FichasSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Lista De Fichas';
$this->registerCssFile("@web/css/UsuariosForm.css", ['depends' => [yii\web\YiiAsset::className()]]);
$this->registerCssFile("@web/css/ficha.css", ['depends' => [yii\web\YiiAsset::className()]]);
$this->registerCssFile('@web/css/tablas.css', ['depends' => [yii\web\YiiAsset::class]]);

// Añadimos el CSS personalizado para aumentar el tamaño de la fuente de la tabla y el color del texto

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
        width: 100%;
        display: flex;
        justify-self: center;
        justify-content: center;
    }
    .paginador1{
        
        color: white;
        width: 50px;
    }
</style>
<div class="Contabla">
<h2><?= Html::encode($this->title) ?></h2>
<hr class="divider">
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


    <div class="table-container">

        <div class="BuscarUsu">
            <?php $form = ActiveForm::begin([
                'action' => ['index'],
                'method' => 'get',
            ]); ?>
            
            <?= $form->field($searchModel, 'globalSearch')->textInput(['placeholder' => 'Buscar por código',
            'style' => 'background:rgb(205, 205, 205); border-radius: 20px; height: 40px;
            font-weight: bold;'
            ])->label(false) ?>
            <?php ActiveForm::end(); ?>
        </div>
    
        <?= GridView::widget([
    'dataProvider' => $dataProvider,
    'options' => ['class' => 'table table-striped'],
    'summary' => 'Mostrando  {begin}  - {end}  de {totalCount} Usuarios.',
    'pager' => [
        'class' => LinkPager::class,
        'options' => ['class' => 'pagination paginador justify-content-center'], // Cambia las clases CSS
        'linkOptions' => ['class' => ' paginador1 ', 'style' => 'background: #39A900; margin: 2px; color:white'], // Cambia las clases de los enlaces
        'prevPageLabel' => '<<', // Etiqueta del botón "Anterior"
        'nextPageLabel' => '>>',    // Etiqueta del botón "Último"
        'maxButtonCount' => 5, // Número máximo de botones
    ],
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        [
            'attribute' => 'codigo',
            'enableSorting' => false,
        ],
        [
            'attribute' => 'fecha_incio',
            'enableSorting' => false,
        ],
        [
            'attribute' => 'programa',
            'value' => 'proIdFK.nombre_programa',
        ],
        [
            'attribute' => 'duracion programa',
            'value' => function($model) {
                return $model->proIdFK->meses . ' meses';
            },
        ],
        [
            'attribute' => 'fecha_final',
            'enableSorting' => false,
        ],
        [
            'attribute' => 'Instructor lider',
            'value' => 'usu.nombre',
        ],
        [
            'attribute' => 'jornada',
            'value' => 'jorIdFK.descripcion',
        ],
        [
            'attribute' => 'fecha_creacion',
            'enableSorting' => false,
        ],
        [
            'class' => ActionColumn::class,
            'header' => 'Acciones',
            'urlCreator' => function ($action, $model, $key, $index) {
                return Url::to([$action, 'fic_id' => $model->fic_id]);
            },
            'template' => '{update} {delete}', 
            'buttons' => [
                'update' => function ($url, $model) {
                    return Html::a(
                        '<i class="bi bi-pencil-fill" style="color: #38A800; font-size: 1.2rem;"></i>', 
                        $url, 
                        ['title' => 'Actualizar']
                    );
                },
                'delete' => function ($url, $model) {
                    return Html::a(
                        '<i class="bi bi-trash-fill" style="color: #38A800; font-size: 1.2rem;"></i>', 
                        $url, 
                        [
                            'title' => 'Eliminar',
                            'data-confirm' => '¿Está seguro de que desea eliminar este registro?',
                            'data-method' => 'post'
                        ]
                    );
                },
            ],
        ],
    ],
    'headerRowOptions' => ['class' => 'header1'],
]); ?>

    </div>
</div>
