<?php

/** @var yii\web\View $this */
/** @var string $content */


use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;


$this->registerCssFile("@web/css/site.css", ['depends' => [yii\web\YiiAsset::className()]]);
$this->registerCsrfMetaTags();
$this->title = 'Sistema de Asignación';
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="web/css/estilos.php">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<?php $this->beginBody() ?>

<div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="border-right" id="sidebar-wrapper">
        <div class="sidebar-heading text-white h3"><h5>Sistema de Asignación</h5>
        <div class="linea"></div>

        <figure>
            <img src="img/img/LogoSena.jpg" alt="Biblioteca" class="img-responsive center-box" style="width:100%;">
        </figure>

        <div class="linea2"></div>

        </div>
        <div class="list-group list-group-flush espaciado">
            <ul class="list-unstyled">
                
                <?php
                    echo Nav::widget([
                        'options' => ['class' => 'list-group-item', 'style' => ''],
                        'items' => [

                            ['label' => '<h5 class="bi bi-house list-group-item" 
                                        style="color: white;">  Home</h5>',
                                        'url' => ['/site/index'], 'encode' => false],   

                            ['label' => '<h5 class="bi bi-people list-group-item" 
                                        style="color: white;">  Usuario</h5>',
                                        'url' => ['/usuario/index'], 'encode' => false],   

                            ['label' => '<h5 class="bi bi-people list-group-item" 
                                        style="color: white;">  Redes</h5>', 
                                        'url' => ['/red/index'], 'encode' => false],

                            ['label' => '<h5 class="bi bi-people list-group-item" 
                                        style="color: white;">  Competencias</h5>', 
                                        'url' => ['/competencias/index'], 'encode' => false],

                            ['label' => '<h5 class="bi bi-journals list-group-item" 
                                        style="color: white;">  Programas</h5>', 
                                        'url' => ['/programa/index'], 'encode' => false],

                            ['label' => '<h5 class="bi bi-people list-group-item" 
                                        style="color: white;">  Asignación</h5>', 
                                        'url' => ['/competenciaprograma/index'], 'encode' => false],
                        ]
                    ]);
                ?>

            </ul>
        </div>


    </div>

    <!-- Page Content -->
    <div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg ">
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarNav">
                    <?php
                    NavBar::begin([
                        'options' => ['class' => 'navbar-nav ms-auto'],
                    ]);
                    echo Nav::widget([
                        'items' => [
                            Yii::$app->user->isGuest
                                ? ['label' => 'Login', 'url' => ['/site/login']]
                                : '<li class="nav-item">'
                                    . Html::beginForm(['/site/logout'], 'post')
                                    . Html::submitButton(
                                        'Logout (' . Yii::$app->user->identity->username . ')',
                                        ['class' => 'nav-link btn btn-link logout']
                                    )
                                    . Html::endForm()
                                    . '</li>'
                        ],
                    ]);
                    NavBar::end();
                    ?>
                </div>
            </div>
        </nav>

        <main class="container-fluid" style="padding-top: 10px;">
            <?= $content ?>
        </main>
    </div>
</div>
<footer class="footer bg-light text-end">
    <div class="container">
        <span class="text-muted">© <?= date('Y') ?> Sistema de Asignación</span>
    </div>
</footer>

<?php $this->endBody() ?>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $("#menu-toggle").click(function (e) {
            e.preventDefault();
            $("#sidebar-wrapper").toggleClass("toggled");
        });
    </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
</body>
</html>
<?php $this->endPage() ?>
