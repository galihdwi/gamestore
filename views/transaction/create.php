<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\table\TransactionTable $model */

$this->title = 'Create Transaction Table';
$this->params['breadcrumbs'][] = ['label' => 'Transaction Tables', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="transaction-table-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
