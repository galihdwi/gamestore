<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\table\TransactionTable $model */

$this->title = 'Update Transaction Table: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Transaction Tables', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="transaction-table-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
