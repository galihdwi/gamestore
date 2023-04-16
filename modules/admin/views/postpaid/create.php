<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\table\PostpaidTable $model */

$this->title = 'Create Postpaid Table';
$this->params['breadcrumbs'][] = ['label' => 'Postpaid Tables', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="postpaid-table-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
