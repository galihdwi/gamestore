<?php

$this->title = 'Create Games Table';
$this->params['breadcrumbs'][] = ['label' => 'Games Tables', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-md-6">
        <div class="py-2">
            <div class="d-flex flex-row py-2">
                <div class="fw-bold fs-5">Tambah Games</div>
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