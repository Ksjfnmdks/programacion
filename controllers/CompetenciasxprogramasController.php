<?php

namespace app\controllers;

use app\models\Competenciasxprogramas;
use app\models\CompetenciasxprogramasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CompetenciasxprogramasController implements the CRUD actions for Competenciasxprogramas model.
 */
class CompetenciasxprogramasController extends Controller
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
     * Lists all Competenciasxprogramas models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new CompetenciasxprogramasSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Competenciasxprogramas model.
     * @param int $id_rel Id Rel
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_rel)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_rel),
        ]);
    }

    /**
     * Creates a new Competenciasxprogramas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Competenciasxprogramas();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['index', 'id_rel' => $model->id_rel]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Competenciasxprogramas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_rel Id Rel
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_rel)
    {
        $model = $this->findModel($id_rel);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_rel' => $model->id_rel]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Competenciasxprogramas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_rel Id Rel
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_rel)
    {
        $this->findModel($id_rel)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Competenciasxprogramas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_rel Id Rel
     * @return Competenciasxprogramas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_rel)
    {
        if (($model = Competenciasxprogramas::findOne(['id_rel' => $id_rel])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
