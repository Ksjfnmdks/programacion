<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="es" class="h-100">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body class="d-flex flex-row h-100">
    <?php $this->beginBody() ?>

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
                    <li><a href="home"><i class="zmdi zmdi-home zmdi-hc-fw"></i>&nbsp;&nbsp; Fichas</a></li>
                    
                    <li>
                        <div class="dropdown-menu-button"><i class="zmdi zmdi-account-add zmdi-hc-fw"></i>&nbsp;&nbsp; Registro de usuarios <i class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw icon-sub-menu"></i></div>
                        <ul class="list-unstyled">
                            <li><a href="admin.html"><i class="zmdi zmdi-face zmdi-hc-fw"></i>&nbsp;&nbsp; Nuevo administrador</a></li>
                            <li><a href="teacher.html"><i class="zmdi zmdi-male-alt zmdi-hc-fw"></i>&nbsp;&nbsp; Nuevo docente</a></li>
                            <li><a href="student.html"><i class="zmdi zmdi-accounts zmdi-hc-fw"></i>&nbsp;&nbsp; Nuevo estudiante</a></li>
                            <li><a href="personal.html"><i class="zmdi zmdi-male-female zmdi-hc-fw"></i>&nbsp;&nbsp; Nuevo personal administrativo</a></li>
                        </ul>
                    </li>
                    <li>
                        <div class="dropdown-menu-button"><i class="zmdi zmdi-assignment-o zmdi-hc-fw"></i>&nbsp;&nbsp; Libros y catálogo <i class="zmdi zmdi-chevron-down pull-right zmdi-hc-fw icon-sub-menu"></i></div>
                        <ul class="list-unstyled">
                            <li><a href="book.html"><i class="zmdi zmdi-book zmdi-hc-fw"></i>&nbsp;&nbsp; Nuevo libro</a></li>
                            <li><a href="catalog.html"><i class="zmdi zmdi-bookmark-outline zmdi-hc-fw"></i>&nbsp;&nbsp; Catálogo</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="col-8 contenidos">
        <header id="header" class="">
            <?php
            NavBar::begin([
                'options' => ['class' => 'navbar-expand-md navbar-dark navbar rounded-0']
            ]);
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav pull-right'],
                'items' => [
                    ['label' => 'Home', 'url' => ['/site/index']],

                    ['label' => 'About', 'url' => ['/site/about']],

                    ['label' => 'Redes', 'url' => ['/red/index']],

                    ['label' => 'Contact', 'url' => ['/site/contact']],
                    
                    Yii::$app->user->isGuest
                        ? ['label' => 'Login', 'url' => ['/site/login']]
                        : '<li class="nav-item">'
                            . Html::beginForm(['/site/logout'])
                            . Html::submitButton(
                                'Logout (' . Yii::$app->user->identity->username . ')',
                                ['class' => 'nav-link btn btn-link logout']
                            )
                            . Html::endForm()
                            . '</li>'
                ]
            ]);
            NavBar::end();
            ?>
        </header>

        <main id="main" class="contenidos1 col-12 d-flex flex-column" role="main">
            
            <?php if (!empty($this->params['breadcrumbs'])): ?>
                <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
            <?php endif ?>
            <?= Alert::widget() ?>
            <?= $content ?>
            
        </main>

        <footer id="footer" class="mt-auto  bg-light">
            <div class="container">
                <div class="row text-muted">
                    <div class="col-md-6 text-center text-md-start">&copy; My Company <?= date('Y') ?></div>
                    <div class="col-md-6 text-center text-md-end"><?= Yii::powered() ?></div>
                </div>
            </div>
        </footer>
    </div>
    

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
