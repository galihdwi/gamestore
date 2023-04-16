<?php

namespace app\modules\admin\controllers;

use app\models\table\GamesTable;
use app\modules\admin\models\form\GamesForm;
use app\modules\admin\models\search\GamesSearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * GamesController implements the CRUD actions for GamesTable model.
 */
class GamesController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all GamesTable models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new GamesSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionCreate()
    {
        $model = new GamesForm();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {

                $file_upload = UploadedFile::getInstance($model, 'image_file');

                if ($file_upload) {
                    $model->image_file = $file_upload;
                } else {
                    $model->brand_logo_file = new UploadedFile([
                        'name' => 'default.png',
                        'tempName' => Yii::getAlias('@webroot') . '/img/placeholder-logo.png',
                        'type' => 'image/png',
                        'size' => 0,
                        'error' => 0
                    ]);
                }

                if ($model->addGames()) {
                    Yii::$app->session->setFlash('success', 'Game added successfully');
                } else {
                    Yii::$app->session->setFlash('error', 'Game added failed');
                }

                return $this->redirect(['index']);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionGetImage($id)
    {
        $model = $this->findModel($id);
        $image = $model->image;

        if (file_exists($image)) {
            return Yii::$app->response->sendFile($image);
        } else {
            return Yii::$app->response->sendFile(Yii::getAlias('@app') . '/files/placeholder-logo.png');
        }
    }

    protected function findModel($id)
    {
        if (($model = GamesTable::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
