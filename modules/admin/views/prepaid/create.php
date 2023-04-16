<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\table\PrepaidTable $model */

$this->title = 'Create Prepaid Table';
$this->params['breadcrumbs'][] = ['label' => 'Prepaid Tables', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="prepaid-table-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
