<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\table\GamesTable $model */

$this->title = 'Update Games Table: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Games Tables', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="games-table-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
