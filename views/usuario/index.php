<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\web\View;
use yii\helpers\Url;


$this->title = 'Lista de Usuarios';

$this->registerCssFile('@web/css/tablas.css', ['depends' => [yii\web\YiiAsset::class]]);
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
        width: 60vw;
        display: flex;
        justify-self: center;
        justify-content: center;
    }
    .paginador1{
        
        color: white;
        width: 50px;
    }
</style>
<link href='https://fonts.googleapis.com/css?family=Work Sans' rel='stylesheet'>
<div class="Contabla">
    <div class="titulo">
        <h1>Lista de Usuarios</h1>
    </div>
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

        <?= $form->field($searchModel, 'globalSearch')
            ->textInput(['placeholder' => 'Buscar'])->label(false) ?>

        <?php ActiveForm::end(); ?>
    </div>
        
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'options' => ['class' => 'table table-striped'],
            'summary' => 'Mostrando  {begin}  - {end}  de {totalCount} Usuarios.',      
            'pager' => [
                'options' => ['class' => 'pagination justify-content-center'],
                'linkOptions' => ['class' => 'page-link'],
                'pageCssClass' => 'page-item',
            ],
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                [
                   'attribute' => 'identificacion',
                    'enableSorting' => false,
                ],
                [
                    'attribute' => 'nombre',
                     'enableSorting' => false,
                ],
                [
                    'attribute' => 'apellido',
                     'enableSorting' => false,
                 ],
                 [
                    'attribute' => 'telefono',
                     'enableSorting' => false,
                 ],
                 [
                    'attribute' => 'correo',
                     'enableSorting' => false,
                 ],
                [
                    'attribute' => 'rol_id_FK',
                    'value' => 'rolIdFK.nombre',
                    'enableSorting' => false,
                ],
                [
                    'attribute' => 'est_id_FK',
                    'value' => 'estIdFK.descripcion',
                    'enableSorting' => false,
                ],
                [
                    'class' => 'yii\grid\ActionColumn',
                    'header' => 'Acciones',
                    'template' => '{view} {update} {delete}',
                    'buttons' => [
                        'view' => function ($url, $model) {
                            return Html::a('<i class="bi bi-eye"></i>',['usuario/view', 'usu_id' => $model->usu_id], ['class' => 'btn btn-info btn-sm']);
                        },
                        'update' => function ($url, $model) {
                            return Html::a('<i class="bi bi-pencil-square"></i>', ['usuario/update', 'usu_id' => $model->usu_id], ['class' => 'btn btn-primary btn-sm']);
                        },
                        'delete' => function ($url, $model, $key) {
                            if ($model->est_id_FK == 1) {
                                return Html::a('<i class="bi bi-trash"></i>', '#', [
                                    'class' => 'btn btn-danger btn-sm deleteButton',
                                    'data-id' => $model->usu_id,
                                    'data-bs-toggle' => 'modal',
                                    'data-bs-target' => '#modalConfirmDelete'
                                ]);
                            }
                            return ''; 
                        },
                    ],
                ],
            ],
            'headerRowOptions' => ['class' => 'header1'], 
        ]); 
        ?>
    </div>
</div>


<!-- Modal de confirmación de eliminación -->
<div class="modal fade" id="modalConfirmDelete" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Confirmar eliminación</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h5>¿Está seguro de que desea eliminar este usuario?</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn" style="background-color: #38A800; color: white;" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn" id="confirmDeleteButton" style="background-color: #38A800; color: white;">Eliminar</button>
            </div>
        </div>
    </div>
</div>


<?php
$this->registerJs("
    document.querySelectorAll('.deleteButton').forEach(button => {
        button.addEventListener('click', function () {
            let id = this.getAttribute('data-id');
            let deleteUrl = '" . Url::to(['usuario/delete', 'usu_id' => '']) . "' + id;

            document.getElementById('confirmDeleteButton').setAttribute('data-url', deleteUrl);
        });
    });

    document.getElementById('confirmDeleteButton').addEventListener('click', function () {
        let url = this.getAttribute('data-url');
        fetch(url, {
            method: 'POST',
            headers: {
                'X-CSRF-Token': '" . Yii::$app->request->csrfToken . "' 
            }
        })
        .then(response => {
            if (response.ok) {
                $('#modalConfirmDelete').modal('hide'); 
                setTimeout(function () {
                    window.location.reload(); // Recargar la página después de un pequeño retraso
                }, 100); 
            } else {
                alert('Error al eliminar el usuario');
            }
        })
        .catch(error => {
            console.error('Error en la solicitud:', error);
            alert('Error al eliminar el usuario.');
        });
    });
", View::POS_READY);
?>

