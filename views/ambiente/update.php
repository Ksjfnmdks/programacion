<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Ambientes $model */

$this->title = 'Update Ambientes: ' . $model->amb_id;



?>

<h1>Actulizar Ambiente</h1>
<div class="linea"></div>

<br>



<div class="create-ambientes-container">

    <div class="lista">
        <?= Html::a(
            Html::img('@web/icon-crear-selecionado.png', ['class' => 'iconosa']) . ' Crear Ambiente', 
            ['ambiente/create'], 
            ['class' => 'listaususelected']
        ) ?>        
        <?= Html::a(
            Html::img('@web/icon-lista.png', ['class' => 'iconosa']) . ' Lista de Ambiente', 
            ['ambiente/index'], 
            ['class' => 'listausu']
        ) ?>
    </div>


    <div class="ambientes-update">

        

        <?= $this->render('_form', ['model' => $model,]) ?>

    </div>





</div>



<style>
    .container3{
        background-color:red;
        width: 40px;
        height:30px
    }

    .linea {
    background-color: black;
    }

    .create-ambientes-container {
        width: 90%; /* Ancho máximo para el contenedor */
        max-width: 800px; /* Limita el tamaño máximo en pantallas grandes */
        margin: 0 auto; /* Centrar el contenedor en la página */
        height:520px;
        padding: 20px;
        
        text-align: center;
        font-family: Arial, sans-serif;
    }

</style>
