<?php

use app\libs\helpers\CustomStringHelper;

$this->title = CustomStringHelper::setPageTitle('Semua List Game');

?>

<div class="row">
    <div class="col-md-12">
        <div class="card border-0 shadow position-relative">
            <div class="card-body" style="min-height: 150px;">
                <div class="d-flex align-items-center position-absolute" style="left: 30px; top: -50px;">
                    <img src="https://api.vocagame.com/media/top%20up%20mobile%20legends-706c.webp" class="img-thumbnail w-25">
                    <div class="mt-5 px-3">
                        <h3 class="fw-bold">Mobile Legends: Bang Bang</h3>
                        <small class="text-muted">Moonton</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row py-5">
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-6 py-3">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <img src="<?= Yii::getAlias('@web') ?>/img/game/gem.png" class="w-10">
                                <div class="px-3">
                                    <div class="fw-bold">5 Diamonds (5 + 0 Bonus)</div>
                                    <small class="text-muted">Rp 1.600,-</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 py-3">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <img src="<?= Yii::getAlias('@web') ?>/img/game/gem.png" class="w-10">
                                <div class="px-3">
                                    <div class="fw-bold">5 Diamonds (5 + 0 Bonus)</div>
                                    <small class="text-muted">Rp 1.600,-</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 py-3">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <img src="<?= Yii::getAlias('@web') ?>/img/game/gem.png" class="w-10">
                                <div class="px-3">
                                    <div class="fw-bold">5 Diamonds (5 + 0 Bonus)</div>
                                    <small class="text-muted">Rp 1.600,-</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="row">
                <div class="col-md-12 p-2">
                    <div class="card border-0 shadow-sm position-relative">
                        <div class="card-body" style="min-height: 150px;">
                            <div class="d-flex flex-column border-bottom">
                                <div class=" d-flex align-items-center text-primary">
                                    <i class="bi bi-controller me-1 fs-4"></i>
                                    <h5>Informasi Pesanan</h5>
                                </div>

                            </div>
                            <div class="pt-3">
                                Masukkan User ID
                                <input type="text" class="form-control">
                            </div>
                            <div class="pt-3">
                                Masukkan Zone ID
                                <input type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 p-2">
                    <div class="card border-0 shadow-sm position-relative">
                        <div class="card-body" style="min-height: 150px;">
                            <div class="d-flex flex-column border-bottom">
                                <div class=" d-flex align-items-center text-primary">
                                    <i class="bi bi-wallet2 me-1 fs-4"></i>
                                    <h5>Pilih Pembayaran</h5>
                                </div>

                            </div>
                            <div class="pt-3">
                                Voucher
                                <input type="text" class="form-control">
                            </div>
                            <div class="pt-3">
                                Metode Pembayaran
                                <select name="" id="" class="form-control">
                                    <option value="">Pilih Metode Pembayaran</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>