<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\web\View;
use yii\helpers\Url;
use yii\bootstrap5\Alert; // Bootstrap 5 Alert

$this->title = 'Lista de Usuarios';
$this->registerCssFile('@web/css/tablas.css', ['depends' => [yii\web\YiiAsset::class]]);
?>

<!-- Mostrar alertas de mensajes flash -->
<?php foreach (Yii::$app->session->getAllFlashes() as $type => $message): ?>
    <?= Alert::widget([
        'options' => ['class' => 'alert-' . $type],
        'body' => $message,
    ]) ?>
<?php endforeach; ?>

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
            <?php $form = ActiveForm::begin(['action' => ['index'], 'method' => 'get']); ?>
                <?= $form->field($searchModel, 'globalSearch')
                    ->textInput(['placeholder' => 'Buscar'])->label(false) ?>
            <?php ActiveForm::end(); ?>
        </div>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'options' => ['class' => 'table table-striped'],
            'summary' => 'Mostrando {begin} - {end} de {totalCount} Usuarios.',
            'pager' => [
                'options' => ['class' => 'pagination justify-content-center'],
                'linkOptions' => ['class' => 'page-link'],
                'pageCssClass' => 'page-item',
            ],
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                ['attribute' => 'identificacion', 'enableSorting' => false],
                ['attribute' => 'nombre', 'enableSorting' => false],
                ['attribute' => 'apellido', 'enableSorting' => false],
                ['attribute' => 'telefono', 'enableSorting' => false],
                ['attribute' => 'correo', 'enableSorting' => false],
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
                            return Html::a(
                                '<i class="bi bi-eye-fill" style="color: #38A800; font-size: 1.2rem;"></i>',
                                ['usuario/view', 'usu_id' => $model->usu_id],
                                ['class' => 'btn btn-sm']
                            );
                        },
                        'update' => function ($url, $model) {
                            return Html::a(
                                '<i class="bi bi-pencil-fill" style="color: #38A800; font-size: 1.2rem;"></i>',
                                ['usuario/update', 'usu_id' => $model->usu_id],
                                ['class' => 'btn btn-sm']
                            );
                        },
                        'delete' => function ($url, $model, $key) {
                            if ($model->est_id_FK == 1) {
                                return Html::a(
                                    '<i class="bi bi-trash-fill" style="color: #38A800; font-size: 1.2rem;"></i>',
                                    '#',
                                    [
                                        'class' => 'btn btn-sm deleteButton',
                                        'data-id' => $model->usu_id,
                                        'data-bs-toggle' => 'modal',
                                        'data-bs-target' => '#modalConfirmDelete'
                                    ]
                                );
                            }
                            return '';
                        },
                    ],
                ],
            ],
            'headerRowOptions' => ['class' => 'header1'],
        ]); ?>
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
            headers: { 'X-CSRF-Token': '" . Yii::$app->request->csrfToken . "' }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                $('#modalConfirmDelete').modal('hide');
                setTimeout(() => window.location.reload(), 100);
            } else {
                alert(data.message);
            }
        })
        .catch(error => {
            console.error('Error en la solicitud:', error);
            alert('Error al eliminar el usuario.');
        });
    });
", View::POS_READY);
?>
