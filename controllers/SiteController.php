<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\User;
use app\models\UsuarioSearch;
use app\models\Usuarios;

class SiteController extends Controller
{


    public function actionAdmin()
    {
        $searchModel = new UsuarioSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
    
        $dataProvider->query->andWhere(['rol_id_FK' => [2, 3]]);
    
        return $this->render('Admin', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionUser()
    {
        return $this->render('user');
    }

    public function actionUserprivilegio()
    {
        return $this->render('userprivilegio');
    }
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'user', 'admin','userprivilegio'],
                'rules' => [
                    [
                        //El administrador tiene permisos sobre las siguientes acciones
                        'actions' => ['logout', 'admin'],
                        //Esta propiedad establece que tiene permisos
                        'allow' => true,
                        //Usuarios autenticados, el signo ? es para invitados
                        'roles' => ['@'],
                        //Este método nos permite crear un filtro sobre la identidad del usuario
                        //y así establecer si tiene permisos o no
                        'matchCallback' => function ($rule, $action) {
                            //Llamada al método que comprueba si es un administrador
                            return User::isUserAdmin(Yii::$app->user->identity->id);
                        },
                    ],
                    [
                       //Los usuarios simples tienen permisos sobre las siguientes acciones
                       'actions' => ['logout', 'user'],
                       //Esta propiedad establece que tiene permisos
                       'allow' => true,
                       //Usuarios autenticados, el signo ? es para invitados
                       'roles' => ['@'],
                       //Este método nos permite crear un filtro sobre la identidad del usuario
                       //y así establecer si tiene permisos o no
                       'matchCallback' => function ($rule, $action) {
                          //Llamada al método que comprueba si es un usuario simple
                          return User::isUserSimple(Yii::$app->user->identity->id);
                      },
                   ],
                   [
                       //Los usuarios simples tienen permisos sobre las siguientes acciones
                       'actions' => ['logout', 'userprivilegio','admin'],
                       //Esta propiedad establece que tiene permisos
                       'allow' => true,
                       //Usuarios autenticados, el signo ? es para invitados
                       'roles' => ['@'],
                       //Este método nos permite crear un filtro sobre la identidad del usuario
                       //y así establecer si tiene permisos o no
                       'matchCallback' => function ($rule, $action) {
                          //Llamada al método que comprueba si es un usuario simple
                          return User::isUserPrivilegio(Yii::$app->user->identity->id);
                      },
                   ],
                ],
            ],
     //Controla el modo en que se accede a las acciones, en este ejemplo a la acción logout
     //sólo se puede acceder a través del método post
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLogin()
{
    $this->layout = 'login';

    if (!\Yii::$app->user->isGuest) {
        $userId = Yii::$app->user->identity->id;
        $user = Usuarios::findOne($userId);

        // Verificar si el usuario está activo
        if ($user && $user->est_id_FK != 2) {
            if (User::isUserAdmin($userId)) {
                return $this->redirect(["site/admin"]);
            }
            if (User::isUserPrivilegio($userId)) {
                return $this->redirect(["site/userprivilegio"]);
            }
            return $this->redirect(["site/user"]);
        } else {
            // Si el usuario está inactivo, lo redirigimos o mostramos un mensaje
            Yii::$app->session->setFlash('error', 'Su cuenta está inactiva. Por favor, contacte al administrador.');
            return $this->redirect(["site/login"]);
        }
    }

    $model = new LoginForm();
    if ($model->load(Yii::$app->request->post()) && $model->login()) {
        $userId = Yii::$app->user->identity->id;
        $user = Usuarios::findOne($userId);

        // Verificar si el usuario está activo
        if ($user && $user->est_id_FK != 2) {
            if (User::isUserAdmin($userId)) {
                return $this->redirect(["site/admin"]);
            }
            if (User::isUserPrivilegio($userId)) {
                return $this->redirect(["site/userprivilegio"]);
            }
            return $this->redirect(["site/user"]);
        } else {
            Yii::$app->user->logout();
            return $this->redirect(["site/login"]);
        }
    }

    return $this->render('login', ['model' => $model]);
}


    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->redirect(["site/login"]);
    }
    
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
