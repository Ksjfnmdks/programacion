<?php

namespace app\controllers;

use app\models\Fichas;
use app\models\FichaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


/**
 * FichaController implements the CRUD actions for TblFichas model.
 */
class FichaController extends Controller
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
     * Lists all TblFichas models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new FichaSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TblFichas model.
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
     * Creates a new TblFichas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Fichas();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                // Redirigir al index después de guardar
                return $this->redirect(['index']);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing TblFichas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $fic_id Fic ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($fic_id)
    {
        $model = $this->findModel($fic_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            // Redirigir al index después de actualizar
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing TblFichas model.
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
     * Finds the TblFichas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $fic_id Fic ID
     * @return TblFichas the loaded model
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
