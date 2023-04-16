<?php

use app\libs\grid\AppGridView;
use app\libs\widgets\ActionButtons;
use yii\grid\ActionColumn;
use yii\grid\DataColumn;
use yii\helpers\Html;
use yii\helpers\Url;

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
                        <?= $this->render('_search', ['model' => $searchModel]); ?>
                    </div>
                    <div class="table-responsive">
                        <?= AppGridView::widget([
                            // 'filterModel' => $reportSearch,
                            'dataProvider' => $dataProvider,
                            'columns' => [
                                ['class' => 'yii\grid\SerialColumn'],
                                [
                                    'class' => DataColumn::class,
                                    'attribute' => 'name',
                                    'header' => 'Nama Games',
                                    'format' => 'raw',
                                    'value' => function ($model) {
                                        $image_url = Url::toRoute(['/admin/games/get-image', 'id' => $model->id]);
                                        $imageTag = Html::img($image_url, ['class' => 'img-fluid me-2', 'style' => 'width: 50px; height: 50px; object-fit: cover;']);

                                        return $imageTag;
                                    }
                                ],
                                'name',
                                [
                                    'class' => DataColumn::class,
                                    'attribute' => 'status',
                                    'header' => 'Status',
                                    'format' => 'raw',
                                    'value' => function ($model) {
                                        $status = $model->status;
                                        $statusTag = Html::tag('span', $status, ['class' => 'badge text-bg-success text-success bg-opacity-10']);
                                        if ($status == 'Inactive') {
                                            $statusTag = Html::tag('span', $status, ['class' => 'badge text-bg-danger text-danger bg-opacity-10']);
                                        }

                                        return $statusTag;
                                    }
                                ],
                                [
                                    'class' => ActionColumn::class,
                                    'header' => 'Actions',
                                    'template' => '{button}',
                                    'buttons' => [
                                        'button' => function ($url, $model, $key) {

                                            $view = [
                                                'text' => "<i class='bi bi-eye me-1'></i> Lihat",
                                                'url' => Url::toRoute(['view', 'id' => Yii::$app->hashid->encode($model->id)]),
                                            ];


                                            return ActionButtons::widget([
                                                'dropdownItems' => [$view],
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