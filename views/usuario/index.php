<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\bootstrap5\Modal; // Para el modal
use yii\web\View;
use yii\helpers\Url;

$this->title = 'Lista de Usuarios';

$this->registerCssFile('@web/css/tablas.css', ['depends' => [yii\web\YiiAsset::class]]);
?>

<style>
    .header1 {
        height: 6vh;
        text-decoration: none;
        background: #39A900;
        color: white;
        pointer-events: none;
        cursor: default;
    }
    .paginador {
        color: white;
        width: 60vw;
        display: flex;
        justify-self: center;
        justify-content: center;
    }
    .paginador1 {
        color: white;
        width: 50px;
    }
</style>
<link href='https://fonts.googleapis.com/css?family=Work Sans' rel='stylesheet'>
<div class="Contabla">
    <h2><?= Html::encode($this->title) ?></h2>
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
            
            <?= $form->field($searchModel, 'identificacion')->textInput(['placeholder' => 'Buscar por identificación'])->label(false) ?>

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
                    'urlCreator' => function ($action, $model, $key, $index) {
                        return Url::to([$action, 'id' => $model->usu_id]);
                    },
                    'template' => '{view} {update} {delete}',
                    'buttons' => [
                        'view' => function ($url) {
                            return Html::a('<i class="bi bi-eye-fill" style="color: #000000;"></i>', $url, [
                                'title' => Yii::t('app', 'Ver'),
                            ]);
                        },
                        'update' => function ($url) {
                            return Html::a('<i class="bi bi-pencil-fill" style="color: #000000;"></i>', $url, [
                                'title' => Yii::t('app', 'Actualizar'),
                            ]);
                        },
                        'delete' => function ($url, $model) {
                            return Html::a('<i class="bi bi-trash-fill" style="color: #000000;"></i>', $url, [
                                'title' => Yii::t('app', 'Desactivar'),
                                'data-confirm' => '¿Realmente quieres inactivar este usuario?',
                                'data-method' => 'post',
                                'data-pjax' => '0', // Evitar conflictos con Pjax
                            ]);
                        },
                    ],
                ],          
            ],
            'headerRowOptions' => ['class' => 'header1'], 
        ]); 
        ?>
    </div>
</div>

<!-- Modal de Confirmación -->
<div class="modal fade" id="modalConfirm" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Confirmar Desactivación</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ¿Estás seguro de que deseas desactivar este usuario?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-danger" id="confirm-delete">Desactivar</button>
            </div>
        </div>
    </div>
</div>

<?php
$script = <<< JS
// Capturar el ID del usuario al hacer clic en el botón de desactivación
$(document).on('click', '.btn-delete', function() {
    var userId = $(this).data('id');  // Obtener el ID del usuario
    $('#confirm-delete').data('id', userId);  // Guardar el ID en el botón de confirmación
});

// Enviar la solicitud POST al confirmar la desactivación
$('#confirm-delete').on('click', function() {
    var userId = $(this).data('id');  // Obtener el ID guardado en el botón
    var url = '<?= Url::to(['usuario/delete']) ?>';  // URL de la acción delete
    
    // Enviar solicitud POST vía AJAX
    $.ajax({
        url: url,
        type: 'POST',
        data: { id: userId },  // Enviar el ID como parámetro en el cuerpo de la solicitud
        success: function(response) {
            window.location.reload();  // Recargar la página tras desactivar el usuario
        },
        error: function() {
            alert('Error al desactivar el usuario.');
        }
    });
});
JS;

$this->registerJs($script);
?>
