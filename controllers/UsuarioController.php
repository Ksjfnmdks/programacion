<?php

namespace app\controllers;
use Yii;
use app\models\Usuarios;
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
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionInstructores()
    {
        $searchModel = new UsuarioSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
    
        // Filtro adicional para asegurar que solo se muestren los roles de instructor
        $dataProvider->query->andWhere(['rol_id_FK' => [2, 3]]);
    
        return $this->render('instructores', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    

    public function actionPerfil()
    {
        $id = Yii::$app->user->identity->id;
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Datos actualizados con éxito.');
            return $this->redirect(['perfil']);
        }

        return $this->render('perfil', [
            'model' => $model,
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
    $model = $this->findModel($usu_id);
    return $this->render('view', [
        'model' => $model,
    ]);
}
    /**
     * Creates a new TblUsuarios model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Usuarios();

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
    
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            Yii::$app->session->setFlash('success', 'Usuario actualizado correctamente.');
            return $this->redirect(['update', 'usu_id' => $model->usu_id]); // Mantén al usuario en la misma vista
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
    /**
 * Deletes an existing TblUsuarios model.
 * If deletion is successful, the browser will be redirected to the 'index' page.
 * @param int $usu_id Usu ID
 * @return \yii\web\Response
 * @throws NotFoundHttpException if the model cannot be found
 */

 public function actionDelete($usu_id)
 {
     $model = $this->findModel($usu_id);
     $model->est_id_FK = 2; // Cambiar el estado en lugar de eliminar
 
     if ($model->save(false)) {
         Yii::$app->session->setFlash('success', 'Usuario eliminado con éxito.');
         $response = ['success' => true, 'message' => 'Usuario eliminado con éxito.'];
     } else {
         Yii::$app->session->setFlash('error', 'Error al eliminar el usuario.');
         $response = ['success' => false, 'message' => 'Error al eliminar el usuario.'];
     }
 
     Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
     return $response;
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
        if (($model = Usuarios::findOne(['usu_id' => $usu_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
