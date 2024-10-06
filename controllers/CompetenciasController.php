<?php

namespace app\controllers;

use app\models\CompetenciasModel;
use app\models\CompetenciasSearch;
use app\models\Resultado; // Asegúrate de importar el modelo Resultado
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CompetenciasController implements the CRUD actions for CompetenciasModel model.
 */
class CompetenciasController extends Controller
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
     * Lists all CompetenciasModel models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new CompetenciasSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * 
     * @param int $id_com Id Com
     * @return string
     * @throws NotFoundHttpException 
     */
    public function actionView($id_com)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_com),
        ]);
    }

    /**
     * 
     * 
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new CompetenciasModel();
    
        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id_com' => $model->id_com]);
            }
        }
    
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * 
     *
     * @param int $id_com Id Com
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException 
     */
    public function actionUpdate($id_com)
    {
        $model = $this->findModel($id_com);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_com' => $model->id_com]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * 
     * 
     * @param int 
     * @return \yii\web\Response
     * @throws NotFoundHttpException 
     */
    public function actionDelete($id_com)
    {
      
        Resultado::deleteAll(['id_com_fk' => $id_com]);
    
       
        $competencia = $this->findModel($id_com);
        if ($competencia->delete()) {
            return $this->redirect(['index']);
        } else {
            Yii::$app->session->setFlash('error', 'No se pudo eliminar la competencia.');
            return $this->redirect(['index']);
        }
    }

    /**
     * 
     *
     * @param int 
     * @return CompetenciasModel 
     * @throws NotFoundHttpException 
     */
    protected function findModel($id_com)
    {
        if (($model = CompetenciasModel::findOne(['id_com' => $id_com])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
