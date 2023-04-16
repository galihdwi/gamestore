<?php

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

?>

<?php $form = ActiveForm::begin(); ?>

<div class="mb-3">
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
</div>

<div class="mb-3">
    <?= $form->field($model, 'status')->dropDownList(['ACTIVE' => 'ACTIVE', 'INACTIVE' => 'INACTIVE']) ?>
</div>

<div class="mb-3">
    <?= $form->field($model, 'image_file')->fileInput(['multiple' => false])->hint('Gambar dalam format: jpg, png, jpeg') ?>
</div>

<div class="d-grid d-md-flex gap-2 justify-content-md-end pt-3">
    <?= Html::a('<i class="bi bi-arrow-left me-1"></i> Kembali', ['index'], ['class' => 'btn btn-light me-2']) ?>
    <?= Html::submitButton('<i class="bi bi-check-circle me-1"></i> Simpan', [
        'class' => 'btn btn-primary ',
    ]) ?>
</div>

<?php ActiveForm::end(); ?>