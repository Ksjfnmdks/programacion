<?php
use yii\helpers\Html;
/** @var yii\web\View $this */
/** @var app\models\Ambiente $model */

$this->title = 'AMBIENTES';
?>
<div class="create-ambientes-container">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="container-boton-buscar">
        <button type="submit" class="boton-buscar" aria-label="Buscar">
            <p><?= Html::a('Lista de ambientes', ['index'], ['class' => 'btn']) ?></p> 
        </button>
    </div>

    <div class="form-wrapper">
        <?= $this->render('_form', ['model' => $model]) ?>
    </div>
</div>

<style>
/* Contenedor principal centrado */
.create-ambientes-container {
    width: 80%; /* Ancho máximo para el contenedor */
    max-width: 800px; /* Limita el tamaño máximo en pantallas grandes */
    margin: 0 auto; /* Centrar el contenedor en la página */
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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
}

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

/* Contenedor del formulario */
.form-wrapper {
    width: 100%;
    max-width: 600px; /* Ancho máximo para el formulario */
    margin: 0 auto; /* Centrar el formulario */
    padding: 20px;
    background-color: #FFFFFF;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}
</style>
