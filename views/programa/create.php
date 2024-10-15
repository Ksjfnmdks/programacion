<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Red $model */
?>
<style>
    .linea {
        width: 90%;
        height: 1px;
    }

    .linea-form {
        background: #000;
        height: 1px;
    }

    .titulo-principal {
        padding-top: 10px;
        font-family: 'Work sans', sans-serif;
        font-size: 28px;
    }

    .titulo-programa {
        font-family: 'Work sans', sans-serif;
        font-size: 28px;
        letter-spacing: 3px;
        margin-top: 10px;
    }

    .btn-crear-red {
        font-family: 'Work sans', sans-serif;
        color: white;
        font-size: 28px;
        border-radius: 10px;
        background-color: rgb(57, 169, 0);
        border: none;
        margin-top: -40px;
    }

    .contenedor-menu {
        width: 60vw;
        height: 5vh;
    }

    .crear-programas {
        font-family: 'Work sans', sans-serif;
        text-decoration: none;
        color: black;
    }

    .lista-programas {
        font-family: 'Work sans', sans-serif;
        text-decoration: none;
        color: black;
    }

    .titulo-crear {
        font-family: 'Work sans', sans-serif;
        font-size: 32px;
    }

    .formulario-crear-programa {
        width: 120vw;
        height: 60vh;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.237);
        border-radius: 15px;
    }

    .caja-red {
        width: 50vw;
        height: 30vh;
    }

    .estilo-programa-red {
        font-family: 'Work sans', sans-serif;
        font-size: 18px;
    }

    .estilo-programa {
        font-size: 18px;
        font-family: 'Work-sans', sans-serif;
    }

    .estilo-nivel-formacion {
        font-size: 18px;
        font-family: 'Work-sans', sans-serif;
    }

    .estilo-version-programa {
        border-color: gray;
        font-size: 18px;
        font-family: 'Work-sans', sans-serif;
        margin-left: 5vw;
    }

    .estilo-horas-meses {
        border-color: gray;
        margin-left: 0px;
        font-size: 18px;
        font-family: 'Work-sans', sans-serif;
        margin-left: 10vw;
    }

    .estilo-horas-meses1 {
        border-color: gray;
        font-size: 18px;
        font-family: 'Work-sans', sans-serif;
    }

    .form-group {
        width: 25vw;
        height: 20vh;
    }

    .combobox-red {
        border-radius: 10px;
        width: 23vw !important;
        height: 7vh;
        font-size: 18px;
        font-family: 'Work-sans', sans-serif;
    }
    .combobox-nivel-formacion{
        width: 17vw;
        height: 5vh;
        border: 1px #a09c9c72 solid;
        border-radius: 5px;
        font-size: 14px;
        font-family: 'Work-sans', sans-serif;
    }
</style>
<title>Redes</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;700&display=swap" rel="stylesheet">
</head>

<body class="d-flex flex-column justify-content-end align-items-center">
    <div class="d-flex col-sm-12 col-xs-12 col-xl-12 col-md-12 col-xxl-12 justify-content-center flex-column align-items-center">
        <br>
        <h1 class="titulo-principal text-dark fw-bold  fs-1">PROGRAMAS</h1>
        <div class="linea1 bg-black"></div>
        <br>
        <div class=" contenedor-menu d-flex flex-row  justify-content-between">
            <div class="d-flex flex-row w-40 h-30">
                <div class="w-30 h-30">
                    <img src="img/icons/boton-agregar.png" alt="agregar">
                </div>
                <div class="w-40 h-30">
                    <h4>
                        <p href="" class="crear-red fw-bold text-decoration-none">&nbsp;Crear &nbsp;Programa</p>
                    </h4>
                </div>
            </div>
            <div class="d-flex flex-row w-40 h-30">
                <div class="w-70 h-30">
                    <h4 class="">
                        <?= Html::a(
                            ' <p class="letra lista-redes"><img src="img/icons/controlar.png" alt="agregar">&nbsp;Lista de &nbsp;Programas</p>',
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
        <form method="POST" class="formulario-crear-programa d-flex flex-column justify-content-center align-items-center col-10 col-sm-7 col-md-8 col-xl-8">
            <br>
            <div class="contenedor-form col-12 col-sm-10 col-md-12 col-xl-12 col-lg-12">
                <h1><?= Html::encode($this->title) ?></h1>
            </div>
            <div class="contenedor-form col-12 col-sm-10 col-md-10 col-xl-11 d-flex flex-column justify-content-center">
                <?= $this->render('_form', [
                    'model' => $model,
                ]) ?>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
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
        height: 20vh;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.237);
        border-radius: 15px;
    }
</style>

</html>