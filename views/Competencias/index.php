<?php

use app\models\Competencias;
use app\models\CompetenciasSearch;
use app\models\Resultados; 
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\widgets\ActiveForm;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var CompetenciasSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Competencias';
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

<div class="competencia-index container">

    <h2 class="text-center" style="border-bottom: 0.3px solid grey; padding-bottom: 20px;"><?= Html::encode($this->title) ?></h2>

    <div class="d-flex justify-content-center my-3 mt-5" style="flex-wrap: wrap;">
        <?= Html::a('<i class="bi bi-plus-circle"></i> Crear Competencias', ['create'], ['class' => 'btn btn-outline-success mx-2 my-2', 'escape' => false]) ?>
        <?= Html::a('<i class="bi bi-list-ul"></i> Lista de Competencias', ['index'], ['class' => 'btn btn-outline-success mx-2 my-2']) ?>
    </div>

    <div class="d-flex justify-content-end mb-4">
        <?php $form = ActiveForm::begin([
            'action' => ['index'],
            'method' => 'get',
        ]); ?>
        <?= Html::textInput('searchTerm', Yii::$app->request->get('searchTerm'), [
            'class' => 'form-control',
            'style' => 'width: 250px !important; background-color: rgb(240, 240, 240);',
            'placeholder' => 'Buscar por Nombre o Codigo',
            'autofocus' => true,
        ]) ?>
        <?php ActiveForm::end(); ?>
    </div>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'options' => ['class' => 'table table-striped table-custom'],
        'summary' => 'Mostrando <strong>{begin}</strong>-<strong>{end}</strong> de <strong>{totalCount}</strong> elementos.',
        'columns' => [
            'codigo',
            'nombre',
            'descripcion',

            [
                'class' => ActionColumn::class,
                'header' => 'Acciones',
                'urlCreator' => function ($action, Competencias $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id_com' => $model->id_com]);
                }
            ],
        ],
    ]); ?>

    <?= Html::a('<i class="bi bi-book"></i> Generar Reporte', ['create'], ['class' => 'btn btn-outline-success mx-2', 'escape' => false]) ?>

    <div class="d-flex justify-content-center">
        <?php 
        $searchTerm = Yii::$app->request->get('searchTerm');

        if ($searchTerm): ?>
            <div class="table-responsive mt-3">
                <h2 class="mt-5 text-center">Resultados de Competencias</h2>
                <table class="table table-bordered table-striped table-custom">
                    <thead>
                        <tr>
                            <th>ID Del Resultado</th>
                            <th>Nombre Del Resultado</th>
                            <th>Nombre de la Competencia</th>
                            <th>Horas</th>
                            <th>Fecha de Creación</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $foundResults = false; 
                        foreach ($dataProvider->models as $competencia): 
                            
                            if (stripos($competencia->nombre, $searchTerm) === false && strpos($competencia->codigo, $searchTerm) === false) {
                                continue; 
                            }

                            $resultados = Resultados::find()->where(['id_com_fk' => $competencia->id_com])->all();
                            if (!empty($resultados)):
                                $foundResults = true; 
                                foreach ($resultados as $resultado): ?>
                                    <tr>
                                        <td><?= Html::encode($resultado->id_res) ?></td>
                                        <td><?= Html::encode($resultado->nombre) ?></td>
                                        <td><?= Html::encode($competencia->nombre) ?></td>
                                        <td><?= Html::encode($resultado->horas) ?></td>
                                        <td><?= Html::encode($resultado->fecha_creacion) ?></td>
                                    </tr>
                                <?php endforeach; 
                            endif; ?>
                        <?php endforeach; ?>
                        <?php if (!$foundResults): ?>
                            <tr>
                                <td colspan="5" class="text-center">No hay resultados disponibles para la competencia "<?= Html::encode($searchTerm) ?>".</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        <?php endif; ?>
    </div>
</div>
