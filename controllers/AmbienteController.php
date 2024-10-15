<?php

namespace app\controllers;

use app\models\Ambiente;
use app\models\AmbienteSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AmbienteController implements the CRUD actions for Ambiente model.
 */
class AmbienteController extends Controller
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
     * Lists all Ambiente models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new AmbienteSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Ambiente model.
     * @param int $amb_id Amb ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($amb_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($amb_id),
        ]);
    }

    /**
     * Creates a new Ambiente model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
        public function actionCreate()
        {
            $model = new Ambiente();

            // Obtener las redes
            $redes = \app\models\Redes::find()->select(['red_id', 'nombre_red'])->asArray()->all();
            $redesOptions = \yii\helpers\ArrayHelper::map($redes, 'id', 'nombre');

            if ($this->request->isPost) {
                if ($model->load($this->request->post()) && $model->save()) {
                    return $this->redirect(['view', 'amb_id' => $model->amb_id]);
                }
            } else {
                $model->loadDefaultValues();
            }

            return $this->render('create', [
                'model' => $model,
                'redesOptions' => $redesOptions, // Pasar las opciones de redes a la vista
            ]);
        }


    /**
     * Updates an existing Ambiente model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $amb_id Amb ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($amb_id)
    {
        $model = $this->findModel($amb_id);
    
        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'amb_id' => $model->amb_id]);
        }
    
        return $this->render('update', [
            'model' => $model,
        ]);
    }
    


    /**
     * Deletes an existing Ambiente model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $amb_id Amb ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($amb_id)
    {
        $this->findModel($amb_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Ambiente model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $amb_id Amb ID
     * @return Ambiente the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($amb_id)
    {
        if (($model = Ambiente::findOne(['amb_id' => $amb_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
