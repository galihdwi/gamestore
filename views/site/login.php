<?php

use app\libs\helpers\CustomStringHelper;
use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\helpers\Url;

$this->context->layout = 'plain-no-container';
$this->title = CustomStringHelper::setPageTitle('Masuk');
?>

<div class="row">
    <div class=" d-sm-block d-md-block col-sm-12 col-md-12 col-lg-6 mx-auto">
        <div class="m-5 p-5 ">
            <div class="mb-5 d-grid gap-4 col-lg-6 text-center">
                <div>
                    <!-- <img class="img-fluid" style="width:65%" src="<?= Yii::getAlias('@web/img/optima.png') ?>" alt="optima"> -->
                    <img class="img-fluid w-100" src="https://api.vocagame.com/media/logohijau-3a71-2a9e.webp" alt="optima">
                </div>
            </div>

            <div class="fs-5 text-primary">MASUK AKUN <?= Yii::$app->name ?></div>
            <h1 class="fw-bold">Selamat Datang</h1>
            <div class="text-muted mb-5">Masukan nama pengguna dan password kamu untuk masuk</div>

            <?php $form = ActiveForm::begin(); ?>

            <div class="d-grid gap-1 ">
                <?= $form->field($model, 'username', ['inputOptions' => [
                    'class' => 'form-control',
                    'placeholder' => 'Masukan nama pengguna',
                ]])->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'password', ['inputOptions' => [
                    'class' => 'form-control',
                    'placeholder' => 'Masukan kata sandi',
                ]])->passwordInput() ?>

                <div class="form-group mb-3">
                    <div class="d-grid">
                        <?= Html::submitButton('<i class="bi bi-box-arrow-right me-1"></i> Masuk', ['class' => 'btn btn-primary btn-block', 'name' => 'login-button']) ?>
                    </div>
                </div>
                <div class="text-center mb-2">
                    Belum punya akun? <a href="<?= Url::to(['site/forgot-password']) ?>" class="text-primary text-decoration-none">Daftar Sekarang</a>
                    <p><a href="<?= Url::to(['site/forgot-password']) ?>" class="text-primary text-decoration-none">Lupa kata sandi?</a></p>
                </div>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
    <div class="d-none d-sm-none d-md-none d-lg-block col-lg-6">
        <img class="img" src="<?= Yii::getAlias('@web/img/login-bg.jpg') ?>" alt="login-bg">
    </div>
</div>