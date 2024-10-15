<?php

namespace app\controllers;

use app\models\Fichas;
use app\models\FichasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FichasController implements the CRUD actions for Fichas model.
 */
class FichasController extends Controller
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
     * Lists all Fichas models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new FichasSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Fichas model.
     * @param int $fic_id Fic ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($fic_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($fic_id),
        ]);
    }

    /**
     * Creates a new Fichas model.
     * If creation is successful, the browser will be redirected to the 'create' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Fichas();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                // Establecer el mensaje flash de éxito
                \Yii::$app->session->setFlash('success', '¡Ficha guardada correctamente!');

                // Redirigir a la página de creación para limpiar los campos
                return $this->redirect(['create']);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Fichas model.
     * If update is successful, the browser will be redirected to the 'index' page.
     * @param int $fic_id Fic ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($fic_id)
    {
        $model = $this->findModel($fic_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            // Redirigir a la lista de fichas
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Fichas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $fic_id Fic ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($fic_id)
    {
        $this->findModel($fic_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Fichas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $fic_id Fic ID
     * @return Fichas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($fic_id)
    {
        if (($model = Fichas::findOne(['fic_id' => $fic_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
