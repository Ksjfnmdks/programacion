<?php

namespace app\controllers;

use app\models\Ambientes;
use app\models\searchAmbiente;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;

/**
 * AmbienteController implements the CRUD actions for Ambientes model.
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
     * Lists all Ambientes models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new searchAmbiente();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Ambientes model.
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
     * Creates a new Ambientes model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Ambientes();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['ambiente/index']);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Ambientes model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $amb_id Amb ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
        public function actionUpdate($amb_id)
    {
        $model = $this->findModel($amb_id);

        if ($this->request->isPost) {
            // Cargar los datos del formulario
            if ($model->load($this->request->post())) {
                // Validar y guardar sin modificar `fecha_creacion`
                if ($model->save(false)) { // Usa `save(false)` para evitar la validación
                    return $this->redirect(['ambiente/index']);
                }
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }


    /**
     * Deletes an existing Ambientes model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $amb_id Amb ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
         public function actionDelete($amb_id)
        {
            // Asegúrate de que se encuentra el modelo antes de intentar eliminarlo
            $model = $this->findModel($amb_id);
            if ($model !== null) {
                $model->delete();
            }

            // Redirige a la acción de índice después de eliminar
            return $this->redirect(['index']);
        }



    /**
     * Finds the Ambientes model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $amb_id Amb ID
     * @return Ambientes the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($amb_id)
    {
        if (($model = Ambientes::findOne(['amb_id' => $amb_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
