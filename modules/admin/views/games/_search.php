<?php

use app\assets\Select2Asset;
use yii\bootstrap5\Html;
use yii\widgets\ActiveForm;

Select2Asset::register($this);
?>

<?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
]); ?>

<div class="row my-2">
    <div class="d-grid d-md-flex justify-content-between gap-2">
        <div class="d-grid d-md-flex align-items-center gap-2 col-md-6">

            <?= Html::activeTextInput($model, 'searchQuery', [
                'class' => 'form-control w-30',
                'placeholder' => 'Search ...',
            ]) ?>

            <?= $form->field($model, 'displayQuery', ['inputOptions' => [
                'class' => 'form-control',
                'id' => 'display-options'
            ], 'options' => [
                'class' => 'form-group',
            ]])->dropDownList([
                10 => 10,
                25 => 25,
                50 => 50,
                100 => 100,
            ], [
                'prompt' => 'Display',
            ])->label(false) ?>

        </div>
        <?= Html::a('<i class="bi bi-plus me-1"></i> Games', ['create'], ['class' => 'btn btn-primary']) ?>
    </div>
</div>

<input type="submit" hidden />

<?php ActiveForm::end(); ?>

<?php

$this->registerJs("

    $('#display-options').select2({
        theme: 'bootstrap-5',
        width: '100%',
        placeholder: 'Display',
    });
    
    $('#display-options').on('change', function() {
        $(this).closest('form').submit();
    });
");
