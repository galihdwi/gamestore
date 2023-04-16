<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\table\GamesTable $model */

$this->title = 'Create Games Table';
$this->params['breadcrumbs'][] = ['label' => 'Games Tables', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="games-table-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
