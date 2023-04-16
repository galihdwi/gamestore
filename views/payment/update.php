<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\table\PaymentTable $model */

$this->title = 'Update Payment Table: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Payment Tables', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="payment-table-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
