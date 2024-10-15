<?php

namespace app\controllers;

use app\models\Programa;
use app\models\ProgramaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;


/**
 * ProgramaController implements the CRUD actions for Programa model.
 */
class ProgramaController extends Controller
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
     * Lists all Programa models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ProgramaSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Programa model.
     * @param int $pro_id Pro ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($pro_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($pro_id),
        ]);
    }

    /**
     * Creates a new Programa model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Programa();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['index', 'pro_id' => $model->pro_id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Programa model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $pro_id Pro ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($pro_id)
    {
        $model = $this->findModel($pro_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'pro_id' => $model->pro_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Programa model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $pro_id Pro ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($pro_id)
    {
        $this->findModel($pro_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Programa model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $pro_id Pro ID
     * @return Programa the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($pro_id)
    {
        if (($model = Programa::findOne(['pro_id' => $pro_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
