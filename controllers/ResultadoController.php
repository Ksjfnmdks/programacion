<?php

namespace app\controllers;

use yii;
use app\models\Resultados;
use app\models\ResultadoSearch;
use app\models\Competencias;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ResultadoController implements the CRUD actions for Resultado model.
 */
class ResultadoController extends Controller
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
     * Lists all Resultado models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ResultadoSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
    
        // Debug: Verifica los parámetros de búsqueda
        \Yii::debug(Yii::$app->request->queryParams, 'searchParams');
    
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Resultado model.
     * @param int $id_res Id Res
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id_res)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_res),
        ]);
    }

    /**
     * Creates a new Resultado model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Resultados();
        $model->fecha_creacion = date('Y-m-d'); // Establece la fecha de hoy
    
        $competencias = Competencias::find()->select(['nombre', 'id_com'])->indexBy('id_com')->column();
    
        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_res' => $model->id_res]);
            }
        } else {
            $model->loadDefaultValues();
        }
    
        return $this->render('create', [
            'model' => $model,
            'competencias' => $competencias,
        ]);
    }

    /**
     * Updates an existing Resultado model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_res Id Res
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_res)
    {
        $model = $this->findModel($id_res); 
        
        $competencias = Competencias::find()->select(['nombre', 'id_com'])->indexBy('id_com')->column();
    
        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_res' => $model->id_res]);
        }
    
        return $this->render('update', [
            'model' => $model,
            'competencias' => $competencias,
        ]);
    }

    /**
     * Deletes an existing Resultado model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_res Id Res
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_res)
    {
        $resultado = $this->findModel($id_res);

        // Intenta eliminar el resultado
        if ($resultado->delete()) {
            Yii::$app->session->setFlash('success', 'Resultado eliminado con éxito.');
            return $this->redirect(['index']);
        } else {
            Yii::$app->session->setFlash('error', 'No se pudo eliminar el resultado.');
            return $this->redirect(['index']);
        }
    }

    /**
     * Finds the Resultado model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_res Id Res
     * @return Resultado the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_res)
    {
        if (($model = Resultados::findOne(['id_res' => $id_res])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('La página solicitada no existe.');
    }
}