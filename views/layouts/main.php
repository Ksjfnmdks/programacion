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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


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
                    <li>
                        <a class="Letras" href="<?= \yii\helpers\Url::to(['usuario/index']) ?>">
                            <?= Html::img('@web/img/icons/icon-user.png', ['alt' => 'Usuarios', 'class' => 'icon']) ?> <font size="4">Usuario</font>
                        </a>
                    </li>
                    <li><a href="<?= \yii\helpers\Url::to(['ficha/index']) ?>"><i class="zmdi zmdi-home zmdi-hc-fw"></i>&nbsp;&nbsp;Fichas</a></li>
                    <li><a href="<?= \yii\helpers\Url::to(['ambiente/index']) ?>"><i class="zmdi zmdi-home zmdi-hc-fw"></i>&nbsp;&nbsp;Ambientes</a></li>
                    <li><a href="<?= \yii\helpers\Url::to(['jornada/index']) ?>"><i class="zmdi zmdi-home zmdi-hc-fw"></i>&nbsp;&nbsp;Ambientes</a></li>
                </ul>
            </div>
        </div>
        </div>

            <div class="col-8 contenidos">
            <header id="header">
            <?php
            NavBar::begin([
                'options' => [
                    'class' => 'navbar navbar-expand-md navbar-dark navbar fixed-top',
                ],
            ]);
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav pull-right'],
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
        </header>


        <main id="main" class="contenidos1 col-12 d-flex flex-column" role="main">
            
            <?php if (!empty($this->params['breadcrumbs'])): ?>
                <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
            <?php endif ?>
            <?= Alert::widget() ?>
            <?= $content ?>
            
        </main>
                
        <footer id="footer" class="mt-auto w-100 bg-light text-right ">
        <div style="padding: 20px">
            <p style="color: #007832; font-weight: bold;">
                <?= Html::img('@web/img/icons/derechos-de-autor.png', ['alt' => 'Icono', 'class' => 'icon']) ?> 2673007 ADSO 2024 Version 1.0
            </p>
        </div>
        </footer>
    </div>
    

    <?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
