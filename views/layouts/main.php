<?php

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'href' => Yii::getAlias('@web/favicon.ico')]);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>

<body class="d-flex flex-column h-100">
    <?php $this->beginBody() ?>

    <header id="header">
        <?php
        NavBar::begin([
            'brandLabel' => Html::img(Yii::getAlias('@web/img/logo.png'), ['alt' => 'brand-logo', 'class' => 'brand-image']),
            'options' => ['class' => 'navbar-expand-md navbar-default bg-white fixed-top']
        ]);

        echo Nav::widget([
            'options' => ['class' => 'navbar-nav ms-auto d-flex align-items-center justify-content-end'],
            'items' => [
                [
                    'label' => '<form class="d-flex" role="search">
                                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                </form>',
                    // 'options' => ['class' => 'w-100'],
                    'encode' => false,
                ],
                [
                    'label' => '<i class="bi bi-box-arrow-right me-1 fw-bold"></i> Keluar',
                    'encode' => false,
                    'url' => ['/site/logout'],
                    'linkOptions' => [
                        'data-method' => 'POST'
                    ]

                ],
            ]
        ]);

        // NavBar::end();
        ?>

    </header>

    <main id="main" class="flex-shrink-0" role="main">
        <div class="container">
            <?php
            echo Nav::widget([
                'options' => ['class' => 'd-flex justify-content-center'],
                'items' => [
                    [
                        'label' => '<i class="bi bi-house me1"></i> Beranda',
                        'url' => ['/site/index'],
                        'encode' => false,
                        'active' => in_array($this->context->route, [
                            'site/index',
                        ])
                    ],
                    [
                        'label' => '<i class="bi bi-controller me-1"></i> Semua Game',
                        'url' => ['/report/index'],
                        'active' => in_array($this->context->route, [
                            'site/index',
                        ]),
                        'encode' => false,
                    ],
                    [
                        'label' => '<i class="bi bi-search me-1"></i> Lacak Pesanan',
                        'url' => ['/report/index'],
                        'active' => in_array($this->context->route, [
                            'site/index',
                        ]),
                        'encode' => false,
                    ],
                    [
                        'label' => '<i class="bi bi-headset me-1"></i> Bantuan',
                        'url' => ['/report/index'],
                        'active' => in_array($this->context->route, [
                            'site/index',
                        ]),
                        'encode' => false,
                    ],
                    [
                        'label' => '<i class="bi bi-arrow-right-square me-1"></i> Logout',
                        'encode' => false,
                        'url' => ['/site/logout'],
                        'linkOptions' => [
                            'data-method' => 'POST'
                        ]

                    ],
                ]
            ]);

            ?>
        </div>
    </main>

    <main id="main" class="bg-primary flex-shrink-0" role="main">
        <div class="container text-white">

            <div class="row">
                <div class="col-lg-4">
                    <h2>Heading</h2>

                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                        dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                        ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                        fugiat nulla pariatur.</p>

                    <p><a class="btn btn-outline-secondary" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p>
                </div>
                <div class="col-lg-4">
                    <h2>Heading</h2>

                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                        dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                        ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                        fugiat nulla pariatur.</p>

                    <p><a class="btn btn-outline-secondary" href="http://www.yiiframework.com/forum/">Yii Forum &raquo;</a></p>
                </div>
                <div class="col-lg-4">
                    <h2>Heading</h2>

                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                        dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                        ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                        fugiat nulla pariatur.</p>

                    <p><a class="btn btn-outline-secondary" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>
                </div>
            </div>
        </div>
    </main>

    <main id="main" class="flex-shrink-0" role="main">
        <div class="container">
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
    </main>

    <footer id="footer" class="mt-auto py-3 bg-light">
        <div class="container">
            <div class="row text-muted">
                <div class="col-md-6 text-center text-xs text-md-start"><?= Yii::$app->params['copyrightText'] ?></div>
            </div>
        </div>
    </footer>

    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>