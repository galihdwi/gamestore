<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\table\PrepaidTable $model */

$this->title = 'Update Prepaid Table: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Prepaid Tables', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="prepaid-table-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
