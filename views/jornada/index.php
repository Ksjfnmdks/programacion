<?php

use app\models\TblJornadas;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\JornadaSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Jornadas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jornadas-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
    <div class="contenido">
        <div class="search-container">
            <div class="container-boton-buscar">
                <button type="submit" class="boton-buscar" aria-label="Buscar">
                    <p><?= Html::a('Crear Jornada', ['create'], ['class' => 'busqueda']) ?></p> 
                </button>
            </div>

            <div class="input">
                <div class="container-busqueda">
                    <?= $form->field($searchModel, 'descripcion')->textInput([
                    'placeholder' => 'Buscar jornada', 
                    'class' => 'busqueda'
                    ])->label(false) ?>
                </div>
            </div>
        </div>

        <?php ActiveForm::end(); ?>
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                'descripcion',
                'hora_inicio',
                'hora_fin',
                'fecha_creacion',
                [
                    'class' => ActionColumn::className(),
                    'header'=>'acciones',
                    'urlCreator' => function ($action, TblJornadas $model, $key, $index, $column) {
                        return Url::toRoute([$action, 'jor_id' => $model->jor_id]);
                    }
                ],
            ],
            'tableOptions' => ['class' => 'table table-striped table-bordered my-custom-class'],
            'emptyText' => 'No se encontraron jornadas.', // Personaliza aquí el texto
        ]); ?>
    </div>
</div>

<!--se pone los estilos aca pq la mlp tabla no toma los estilos desde otra hoja de css-->
<style>
    
    .jornadas-index {
    width: 75%;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
}

.contenido {
    width: 100%;
}

.search-container {
    height: 40px;
    display: flex; 
    align-items: center;
    justify-content: space-between;
    margin-bottom: 20px;
    width: 100%; 
}

.input {
display: flex;
justify-content: center;
align-items: center;
width: 25%;
height: 100%; /* Ajusta la altura del contenedor del input */
margin: 0;
padding: 0;
}

.busqueda {
display: block;
color: #000;
width: 100%;
height: 35px; /* Ajusta la altura del input */
margin: 0 auto;
}


.container-busqueda {
width: 100%; /* Asegura que el input ocupe el ancho completo del contenedor */
display: flex;
justify-content: center;
align-items: center;
padding-top: 21px;
}


.container-boton-buscar {
    height: 100%;
    /* Ajustar el ancho del contenedor del botón según sea necesario */
}
.boton-buscar {
    height: 35px; /* Ajusta la altura */
    width: 150px; /* Ajusta el ancho */
    background-color: #38A800; /* Color de fondo */
    color: black; /* Color del texto */
    border: none; /* Eliminar borde */
    padding: 5px; /* Ajusta el espaciado interno */
    font-size: 16px; /* Tamaño de fuente */
    border-radius: 5px; /* Bordes redondeados */
    cursor: pointer; /* Cambiar cursor al pasar sobre el botón */
    transition: background-color 0.3s ease, transform 0.3s ease; /* Transiciones suaves */
}

.boton-buscar:hover {
    background-color: #FFFFFF; /* Color de fondo al pasar el cursor */
    transform: scale(1.05); /* Aumenta ligeramente el tamaño */
}

.boton-buscar:active {
    background-color: #265C00; /* Color cuando se presiona */
    transform: scale(0.98); /* Reducir ligeramente cuando se hace clic */
}

.boton-buscar:focus {
    outline: none; /* Elimina el borde de enfoque */
    box-shadow: 0 0 5px rgba(0, 0, 0, 0.3); /* Añadir sombra cuando está enfocado */
}

/*estilos de la tabla*/
.my-custom-class {
    background-color: #FFFFFF; /* Fondo de la tabla */
    border: 2px solid #000; /* Borde de la tabla */
}

.my-custom-class th {
    background-color: #38A800; /* Fondo de los encabezados */
    color: white; /* Color del texto en los encabezados */
    padding: 10px;
    text-align: center;
}

.my-custom-class td {
    padding: 8px;
    text-align: left; /* Alineación del texto en celdas */
}

.my-custom-class tr:nth-child(even) {
    background-color: #f2f2f2; /* Alternar colores de filas */
}

/* Asegúrate de que la tabla sea responsive */
@media (max-width: 600px) {
    .my-custom-class {
        font-size: 12px; /* Tamaño de fuente más pequeño en pantallas pequeñas */
    }

    .my-custom-class th, .my-custom-class td {
        padding: 8px; /* Reducir padding en pantallas pequeñas */
    }
}
</style>