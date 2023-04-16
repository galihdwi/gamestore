<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\table\GamesTable $model */

$this->title = 'Update Games Table: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Games Tables', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>

<div class="row">
    <div class="col-md-6">
        <div class="py-2">
            <div class="d-flex flex-row py-2">
                <div class="fw-bold fs-5">Ubah Data Games</div>
            </div>
            <div class="card border-1">
                <div class="card-body">
                    <?= $this->render('_form', [
                        'model' => $model,
                    ]) ?>
                </div>
            </div>
        </div>
    </div>
</div>