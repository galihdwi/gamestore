<?php

use app\libs\grid\AppGridView;
use app\libs\widgets\ActionButtons;
use app\models\table\GamesTable;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\modules\admin\models\search\GamesSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Games Tables';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-md-12">
        <div class="py-2">
            <div class="d-flex flex-row py-2">
                <div class="fw-bold fs-5">Daftar Games</div>
            </div>
            <div class="card border-1">
                <div class="card-body">
                    <div id="search-report">
                        <?php // $this->render('_search', ['model' => $reportSearch]); 
                        ?>
                        <?= Html::a('<i class="bi bi-plus me-1"></i> Games', ['create'], ['class' => 'btn btn-primary']) ?>
                    </div>
                    <div class="table-responsive">
                        <?= AppGridView::widget([
                            // 'filterModel' => $reportSearch,
                            'dataProvider' => $dataProvider,
                            'columns' => [
                                ['class' => 'yii\grid\SerialColumn'],
                                'name',
                                'status',
                                [
                                    'class' => ActionColumn::class,
                                    'header' => 'Actions',
                                    'template' => '{button}',
                                    'buttons' => [
                                        'button' => function ($url, $model, $key) {
                                            $delete = [
                                                'text' => "<i class='bi bi-trash me-1'></i> Delete",
                                                'url' => Url::to(['delete', 'id' => $model->id]),
                                                'options' => ['data-method' => 'post', 'data-confirm' => 'Are you sure you want to delete this item?'],
                                            ];

                                            return ActionButtons::widget([
                                                'dropdownItems' => [
                                                    $delete,
                                                ],
                                            ]);
                                        }
                                    ]
                                ]

                            ],
                        ]); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>