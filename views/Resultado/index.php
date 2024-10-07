<?php

use app\models\Resultado;
use app\models\ResultadoSearch;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\widgets\ActiveForm;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var ResultadoSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Resultados';
$this->params['breadcrumbs'][] = $this->title;
?>

<style>
    .table-custom {
        border-radius: 10px;
        overflow: hidden;
    }

    .btn:hover {
        background-color: #38A800;
    }

    .table-custom th {
        background-color: #38A800;
        color: white; 
    }
    .table-custom th a {
        color: white; 
        text-decoration: none;
    }

    .table-custom tr:nth-child(even) {
        background-color: #e9ecef;
    }
    .table-custom tr:hover {
        background-color: #d1e7dd; 
    }

    svg {
    color: #38A800;
}

</style>

<div class="resultado-index container">

<h2 class="text-center" style="border-bottom: 0.3px solid grey; padding-bottom: 20px;"><?= Html::encode($this->title) ?></h2>

<div class="d-flex justify-content-center my-3 mt-5" style="flex-wrap: wrap;">
    <?= Html::a('<i class="bi bi-plus-circle"></i> Crear Resultado', ['create'], ['class' => 'btn btn-outline-success mx-2 my-2', 'escape' => false]) ?>
    <?= Html::a('<i class="bi bi-list-ul"></i> Lista de Resultados', ['index'], ['class' => 'btn btn-outline-success mx-2 my-2']) ?>
    <?= Html::a('<i class="bi bi-list-ul"></i> Lista de Asignaciones', ['/asignaciones/index'], ['class' => 'btn btn-outline-success mx-2 my-2']) ?>
</div>

<div class="d-flex justify-content-end mb-4">
    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
    <?= Html::textInput('ResultadoSearch[searchTerm]', Yii::$app->request->get('ResultadoSearch')['searchTerm'] ?? '', [
        'class' => 'form-control',
        'style' => 'width: 250px !important; background-color: rgb(240, 240, 240);',
        'placeholder' => 'Buscar por Nombre o ID',
        'autofocus' => true,
    ]) ?>
    <?php ActiveForm::end(); ?>
</div>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'options' => ['class' => 'table table-striped table-custom'], 
    'summary' => 'Mostrando <strong>{begin}</strong>-<strong>{end}</strong> de <strong>{totalCount}</strong> elementos.',
    'columns' => [
        'id_res',
        'nombre',
        'horas',
        'fecha_creacion',
        [
            'attribute' => 'id_com_fk',
            'label' => 'Competencia',
            'value' => function ($model) {
                return $model->competencia ? $model->competencia->nombre : 'N/A';
            },
        ],
        [
            'class' => ActionColumn::class,
            'urlCreator' => function ($action, Resultado $model, $key, $index, $column) {
                return Url::toRoute([$action, 'id_res' => $model->id_res]);
            }
        ],
    ],
    
]); ?>

<?= Html::a('<i class="bi bi-book"></i> Generar Reporte', ['create'], ['class' => 'btn btn-outline-success mx-2', 'escape' => false]) ?>

<?php if (!empty(Yii::$app->request->get('searchTerm')) && $dataProvider->getCount() === 0): ?>
    <div class="mt-3 text-center">
        <h4>No hay resultados disponibles para "<?= Html::encode(Yii::$app->request->get('searchTerm')) ?>"</h4>
    </div>
<?php endif; ?>

</div>
