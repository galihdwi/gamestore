<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\table\PaymentTable $model */

$this->title = 'Create Payment Table';
$this->params['breadcrumbs'][] = ['label' => 'Payment Tables', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="payment-table-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
