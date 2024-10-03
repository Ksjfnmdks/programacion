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

<<<<<<< HEAD
    <div class="col-4 sidebar">
        <div class="visible-xs font-movile-menu mobile-menu-button"></div>
        <div class="full-reset nav-lateral-scroll sidebar">
            <br>
            <div class="logo full-reset all-tittles ">
                <i class="visible-xs zmdi zmdi-close pull-left mobile-menu-button" style="line-height: 45px; cursor: pointer; padding: 0 5px; margin-left: 7px;"></i> 
                sistema de asignación
            </div>
            <div class="nav-lateral-divider full-reset"></div>
            <div class="full-reset" style="padding: 10px 0; color:#fff;">
                <figure>
                    <img src="img/img/LogoSena.jpg" alt="Biblioteca" class="img-responsive center-box" style="width:75%;">
                </figure>
                <p class="text-center" style="padding-top: 15px;">Sistema de Asignación</p>
            </div>
            <div class="nav-lateral-divider full-reset"></div>
            <div class="full-reset nav-lateral-list-menu">
                <ul class="list-unstyled">
                    <li><a href="home"><i class="zmdi zmdi-home zmdi-hc-fw"></i>&nbsp;&nbsp; Inicio</a></li>
                    <li><a href="<?= \yii\helpers\Url::to(['usuario/index']) ?>"><i class="zmdi zmdi-home zmdi-hc-fw"></i>&nbsp;&nbsp; Usuarios</a></li>
                    <li><a href="<?= \yii\helpers\Url::to(['ficha/index']) ?>"><i class="zmdi zmdi-home zmdi-hc-fw"></i>&nbsp;&nbsp;Fichas</a></li>
                    <li><a href="<?= \yii\helpers\Url::to(['ambiente/index']) ?>"><i class="zmdi zmdi-home zmdi-hc-fw"></i>&nbsp;&nbsp;Ambientes</a></li>
                    <li><a href="<?= \yii\helpers\Url::to(['jornada/index']) ?>"><i class="zmdi zmdi-home zmdi-hc-fw"></i>&nbsp;&nbsp;Jornada</a></li>
                </ul>
            </div>
=======
>>>>>>> 96f37c04d7b0350957a81cc90173e6da1c4101ff
        </div>
        <div class="list-group list-group-flush espaciado">
            <ul class="list-unstyled">
                <li><a href="home" class="list-group-item">Inicio</a></li>
                <li>
                    <a class="list-group-item tletra" href="<?= \yii\helpers\Url::to(['usuario/index']) ?>">
                        <?= Html::img('@web/img/icons/icon-user.png', ['alt' => 'Usuarios', 'class' => 'icon']) ?> Usuario
                    </a>
                </li>
                <li><a href="<?= \yii\helpers\Url::to(['ficha/index']) ?>" class="list-group-item">Fichas</a></li>
                <li><a href="<?= \yii\helpers\Url::to(['ambiente/index']) ?>" class="list-group-item">Ambientes</a></li>
                <li><a href="<?= \yii\helpers\Url::to(['jornada/index']) ?>" class="list-group-item">Jornadas</a></li>
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

        <main class="container-fluid" style="padding-top: 70px;">
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
</body>
</html>
<?php $this->endPage() ?>
