<?php

namespace app\controllers;
use Yii;
use app\models\TblUsuarios;
use app\models\UsuarioSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UsuarioController implements the CRUD actions for TblUsuarios model.
 */
class UsuarioController extends Controller
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
     * Lists all TblUsuarios models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new UsuarioSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single TblUsuarios model.
     * @param int $usu_id Usu ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($usu_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($usu_id),
        ]);
    }

    /**
     * Creates a new TblUsuarios model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new TblUsuarios();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                // Establecer un mensaje flash de éxito
                Yii::$app->session->setFlash('success', 'Usuario registrado con éxito.');

                // Permanecer en la misma página recargando
                return $this->refresh();
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }
    

    /**
     * Updates an existing TblUsuarios model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $usu_id Usu ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($usu_id)
    {
        $model = $this->findModel($usu_id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'usu_id' => $model->usu_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing TblUsuarios model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $usu_id Usu ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($usu_id)
    {
        $this->findModel($usu_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the TblUsuarios model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $usu_id Usu ID
     * @return TblUsuarios the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($usu_id)
    {
        if (($model = TblUsuarios::findOne(['usu_id' => $usu_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
