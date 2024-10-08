<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Ambiente $model */
/** @var array $redes */ 



$this->registerCssFile('@web/css/tablas.css', ['depends' => [yii\web\YiiAsset::class]]);
?>

<br>
<div class="div text-center">
    <h1>Crear Ambiente</h1>

</div>
<hr class="divider2">


<div class="create-ambientes-container">

    <div class="lista">
            <?= Html::a(
                Html::img('@web/img/icons/icon-crear-selecionado.png', ['class' => 'iconosa']) . ' Crear Ambiente', 
                '#',
                ['class' => 'listaususelected']
            ) ?>        
            <?= Html::a(
                Html::img('@web/img/icons/icon-lista.png', ['class' => 'iconosa']) . ' Lista de Asuarios', 
                ['ambiente/index'], 
                ['class' => 'listausu']
            ) ?>
    </div>

    <h1><?= Html::encode($this->title) ?></h1>


    <div class="form-wrapper">
        <?= $this->render('_form', ['model' => $model, 'redesOptions' => $redesOptions]) ?> 
    </div>

</div>

<style>
/* Contenedor principal centrado */
.create-ambientes-container {
     /* Ancho máximo para el contenedor */
    max-width: 900px; /* Limita el tamaño máximo en pantallas grandes */
    margin: 0 auto; /* Centrar el contenedor en la página */
    height: 830px;
    
    padding: 20px;
    
    text-align: center;
    font-family: Arial, sans-serif;
}

/* Estilos para el título */
.create-ambientes-container h1 {
    font-size: 24px;
    font-weight: bold;
    color: #000;
    margin-bottom: 20px;
}

/* Botón en la parte superior */
.container-boton-buscar {
    margin-bottom: 20px;
    display: flex;
    justify-content: space-between; /* Alinea los botones a los lados opuestos */
    align-items: center; /* Asegura que los botones estén centrados verticalmente */
}


/* Estilos de los botones */
.boton-buscar {
    height: 35px;
    width: 150px;
    background-color: #FFFFFF;
    color: #2F7A00;
    border: 1px solid #2F7A00;
    padding: 5px;
    font-size: 16px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.3s ease;
}

.boton-buscar:hover {
    background-color: #2F7A00;
    color: #FFFFFF;
    transform: scale(1.05);
}

.boton-buscar:active {
    background-color: #265C00;
    transform: scale(0.98);
}

.linea {
    background-color: black;
}

.form-wrapper {
    margin-top: 20px; /* Añadir margen superior al formulario */
}
</style>
