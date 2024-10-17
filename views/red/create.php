<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Red $model */
?>
<style>
    .linea-prin{
        width: 70vw;
        height: 1px;
    }
    .linea{
        width: 90%;
        height: 1px;
    }
    .linea-form{
        background: #000;
        height: 1px;
    }
    .titulo-principal{
        font-family: 'Work sans', sans-serif;
    }
    .btn-crear-red{
        font-family: 'Work sans', sans-serif;
        color: white;
        font-size: 28px;
        border-radius: 10px;
        background-color: rgb(57, 169, 0);
        border: none;
    }
    .contenedor-menu{
        width: 70%;
        height: 30%;
    }
    .crear-red{
        font-family: 'Work sans', sans-serif;
        text-decoration: none;
        color: black;
    }
    .lista-redes{
        font-family: 'Work sans', sans-serif;
        text-decoration: none;
        color: black;
    }
    .titulo-crear{
        font-family: 'Work sans', sans-serif;
        font-size: 32px;
    }
    .formulario-crear-red{
        width: 60vw;
        height: 40vh;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.237);
        border-radius: 15px;
    }
    .caja-red{
        width: 50vw;
        height: 30vh;
    }
    .mi-label-estilo{
        font-size: 28px;
    }
    .form-group{
        width: 25vw;
        height: 20vh;
    }
</style>

<div class="red-create">
<div class="d-flex col-sm-12 col-xs-12 col-xl-12 col-md-12 justify-content-center flex-column align-items-center">
    <br>
        <h1 class="titulo-principal text-dark fw-bold">REDES</h1>
        <div class="linea-prin bg-black"></div>
        <br>
        <div class=" contenedor-menu d-flex flex-row justify-content-between">
            <div class="d-flex flex-row w-40 h-30">
                <div class="w-30 h-30">
                    <img src="img/icons/boton-agregar.png" alt="agregar">
                </div>
                <div class="w-40 h-30">
                    <h4>
                        <a rel="stylesheet" href="#"class="crear-red fw-bold" style="text-decoration: none; color: black;" disabled>Crear Red</a>
                    </h4>
                </div>
            </div>
            <div class="d-flex flex-row w-40 h-30">
                <div class="w-40 h-30">
                <h4 class="">
                        <?= Html::a(
                            ' <p class="letra lista-redes"><img src="img/icons/controlar.png" alt="agregar">&nbsp;Lista de &nbsp;Redes</p>',
                            ['index'],
                            [
                                'class' => 'fw-bolder icon-link icon-link-hover',
                                'style' => 'color: black; text-decoration: none; font-size: 1.5rem;',
                                'encode' => false
                            ]
                        ) ?>
                    </h4>
                </div>
            </div>
        </div>
        <br>
        <form method="POST" class="formulario-crear-red container-fluid d-flex flex-column align-items-center col-10 col-sm-7 col-md-7 col-xl-5">
            <div class="contenedor-form col-12 col-sm-10 col-md-10">
                <h1><?= Html::encode($this->title) ?></h1>
            </div>
            <div class="contenedor-form col-12 col-sm-10 col-md-10 col-xl-10 d-flex flex-column justify-content-center">
                <?= $this->render('_form', [
                    'model' => $model,
                ]) ?>
            </div>
            <br>
        </form>
    </div>

</div>


<style>
    .linea1 {
        width: 90%;
        height: 1px;
        background: black;
    }

    .linea-form {
        background: #000;
        width: 32vw;
        height: 1px;
    }

    .titulo-principal {
        font-family: 'Work sans', sans-serif;
    }

    .contenedor-menu {
        width: 70%;
        height: 30%;
    }

    .crear-red {
        font-family: 'Work sans', sans-serif;
        text-decoration: none;
        color: gray;
    }

    .lista-redes {
        font-family: 'Work sans', sans-serif;
        text-decoration: none;
        color: black;
    }

    .lista-redes:hover {
        font-family: 'Work sans', sans-serif;
        text-decoration: none;
        color: #39A900;
    }

    .titulo-crear {
        font-family: 'Work sans', sans-serif;
        font-size: 32px;
    }

    .formulario-crear-red {
        width: 521px;
        height: 301px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.237);
        border-radius: 15px;
    }
</style>