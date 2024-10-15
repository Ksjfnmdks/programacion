<?php

/** @var yii\web\View $this */
/** @var string $content */

use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

use yii\web\YiiAsset; 
use yii\bootstrap5\BootstrapAsset;


YiiAsset::register($this);
BootstrapAsset::register($this);

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
    <link rel="stylesheet" href="web/css/botones.css">
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
                            ['label' => '<h5 class="bi bi-house list-group-item" style="color: white;">  Home</h5>', 'url' => ['/site/index'], 'encode' => false],   
                            ['label' => '<h5 class="bi bi-people list-group-item" style="color: white;">  Usuario</h5>', 'url' => ['/usuario/index'], 'encode' => false],   
                            ['label' => '<h5 class="bi bi-people list-group-item" style="color: white;">  Redes</h5>', 'url' => ['/red/index'], 'encode' => false],
                            ['label' => '<h5 class="bi bi-people list-group-item" style="color: white;">  Competencias</h5>', 'url' => ['/competencias/index'], 'encode' => false],
                            ['label' => '<h5 class="bi bi-journals list-group-item" style="color: white;">  Programas</h5>', 'url' => ['/programa/index'], 'encode' => false],
                            ['label' => '<h5 class="bi bi-people list-group-item" style="color: white;">  Asignación</h5>', 'url' => ['/competenciaprograma/index'], 'encode' => false],
                            ['label' => '<h5 class="bi bi-people list-group-item" style="color: white;">  Ambiente</h5>', 'url' => ['/ambiente/index'], 'encode' => false],
                        ]
                    ]);
                ?>
            </ul>
        </div>
    </div>

    <!-- Page Content -->
    <div id="page-content-wrapper">
        <nav class="navbar navbar-expand-lg col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12" style='height: 8.5%;'>
            <div class="container-fluid">
                <div class="collapse navbar-collapse" id="navbarNav">
                <?php
                NavBar::begin([
                    'options' => ['class' => 'navbar-nav ms-auto'],
                ]);
                echo Nav::widget([
                    'items' => [
                        Yii::$app->user->isGuest
                            ? ['label' => 'Iniciar Sesión', 'url' => ['/site/login']]
                            : '<li class="nav-item">'
                                . Html::beginForm(['/site/logout'], 'post', ['class' => 'logout-form', 'id' => 'logout-form'])
                                . Html::button(
                                    ' ' . Yii::$app->user->identity->username . '',
                                    [
                                        'class' => 'bi bi-person-circle nav-link btn btn-link logout',
                                        'style' => 'font-size: 1.3rem;',
                                        'data-bs-toggle' => 'modal',
                                        'data-bs-target' => '#logoutModal',
                                    ]
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

<!-- Modal de Confirmación -->
<div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="logoutModalLabel">Confirmar Cierre de Sesión</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ¿Estás seguro de que deseas cerrar sesión?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn" data-bs-dismiss="modal" style="background-color: #39A900; color: white;">Cancelar</button>
                <button type="button" class="btn" id="confirmLogout" style="background-color: #39A900; color: white;">Cerrar Sesión</button>
            </div>


        </div>
    </div>
</div>

<script>
    document.getElementById('confirmLogout').addEventListener('click', function () {
        document.getElementById('logout-form').submit();
    });
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
<?php $this->endPage() ?>

