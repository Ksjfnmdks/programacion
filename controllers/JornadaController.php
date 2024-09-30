<?php

namespace app\controllers;

use app\models\TblJornadas;
use app\models\JornadaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * JornadaController implements the CRUD actions for TblJornadas model.
 */
class JornadaController extends Controller
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
     * Lists all TblJornadas models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new JornadaSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TblJornadas model.
     * @param int $jor_id Jor ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($jor_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($jor_id),
        ]);
    }

    /**
     * Creates a new TblJornadas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new TblJornadas();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'jor_id' => $model->jor_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing TblJornadas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $jor_id Jor ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($jor_id)
    {
        $model = $this->findModel($jor_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'jor_id' => $model->jor_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }
    
    /**
     * Deletes an existing TblJornadas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $jor_id Jor ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($jor_id)
    {
        $this->findModel($jor_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TblJornadas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $jor_id Jor ID
     * @return TblJornadas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($jor_id)
    {
        if (($model = TblJornadas::findOne(['jor_id' => $jor_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('Esta pagina no existe.');
    }
}
