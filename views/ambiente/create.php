<?php
use yii\helpers\Html;
/** @var yii\web\View $this */
/** @var app\models\Ambiente $model */ 
?>
<h1>Crear Ambiente</h1>
<div class="linea"></div>

<br>

<div class="create-ambientes-container">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="lista">
        <?= Html::a(
            Html::img('@web/icon-crear-selecionado.png', ['class' => 'iconosa']) . ' Crear Ambiente', 
            '#',
            ['class' => 'listaususelected']
        ) ?>        
        <?= Html::a(
            Html::img('@web/icon-lista.png', ['class' => 'iconosa']) . ' Lista de Ambiente', 
            ['ambiente/index'], 
            ['class' => 'listausu']
        ) ?>
    </div>

    <div class="form-wrapper">
        <?= $this->render('_form', ['model' => $model]) ?>
    </div>
</div>

<style>
/* Contenedor principal centrado */
.create-ambientes-container {
    width: 90%; /* Ancho máximo para el contenedor */
    max-width: 800px; /* Limita el tamaño máximo en pantallas grandes */
    margin: 0 auto; /* Centrar el contenedor en la página */
    height:520px;
    background-color:red;
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

