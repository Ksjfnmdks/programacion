<?php

use app\models\Ambientes;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\searchAmbiente $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */




?>

<h1>Lista de ambientes</h1>
<div class="linea"></div>





<div class="ambientes-index">
        
    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
    <div class="contenido">
        <div class="search-container">
            <div class="container-boton-buscar">
                <?= Html::a(
                    Html::img('@web/icon-crear-selecionado.png', ['class' => 'iconosa']) . ' Crear Ambiente', 
                    ['ambiente/create'], 
                    ['class' => 'listaususelected']
                ) ?>  
            </div>

            <div class="input">
                <div class="container-busqueda">
                    <?= $form->field($searchModel, 'nombre_ambiente')->textInput([
                    'placeholder' => 'Buscar ambiente', 
                    'class' => 'busqueda'
                    ])->label(false) ?>
                </div>
            </div>
        </div>
        
        <?php ActiveForm::end(); ?>
        
        <!-- Aumentar el ancho de la tabla directamente -->
        
    </div>
    <div class="tabla1">
        <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'nombre_ambiente',
                    'descripcion',
                    'fecha_creacion',
                    [
                        'class' => ActionColumn::class,
                        'urlCreator' => function ($action, Ambientes $model, $key, $index, $column) {
                            return Url::toRoute([$action, 'amb_id' => $model->amb_id]);
                        }
                        
                    ],
                ],
                'tableOptions' => ['class' => 'table table-striped table-bordered my-custom-class'],
                'summary' => '',
                
            ]); ?>
    </div>

</div>

<!--se pone los estilos aca pq la mlp tabla no toma los estilos desde otra hoja de css-->
<style>

    .tabla1{
        
        width: 80%;
    }
    
    .ambientes-index {
        width: 100%;
        display: flex;
        
    
        flex-direction: column;
        align-items: center;
    }

    /* Aumenté el max-width para hacer la tabla más ancha */
    .contenido {
        width: 1200px; /* Ocupa el 100% del ancho disponible */
        max-width: 1600px; /* Aumenté el max-width a 1600px para hacerla más amplia */
       
        padding: 20px; /* Añadí algo de padding para mejorar el espacio */
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
        height: 100%;
        margin: 0;
        padding: 0;
    }

    .busqueda {
        display: block;
        color: #000;
        width: 100%;
        height: 35px;
        margin: 0 auto;
    }

    .container-busqueda {
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        padding-top: 21px;
    }

    .container-boton-buscar {
        height: 100%;
    }

    .boton-buscar {
        height: 35px;
        width: 150px;
        background-color: #38A800;
        color: black;
        border: none;
        padding: 5px;
        font-size: 16px;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease, transform 0.3s ease;
    }

    .boton-buscar:hover {
        background-color: #FFFFFF;
        transform: scale(1.05);
    }

    .boton-buscar:active {
        background-color: #265C00;
        transform: scale(0.98);
    }

    .boton-buscar:focus {
        outline: none;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
    }

    /* Estilos de la tabla */
    .my-custom-class {
        background-color: #FFFFFF;
        border: 2px solid #000;
        width: 100%; /* Esto hará que la tabla ocupe todo el espacio disponible */
    }

    .my-custom-class th {
        background-color: #38A800;
        color: white;
        padding: 10px;
        text-align: center;
    }

    .my-custom-class td {
        padding: 8px;
        text-align: left;
    }

    .my-custom-class tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    /* Asegurarte de que la tabla sea responsive */
    @media (max-width: 600px) {
        .my-custom-class {
            font-size: 12px;
        }
        .my-custom-class th, .my-custom-class td {
            padding: 8px;
        }
    }
</style>


<?php

