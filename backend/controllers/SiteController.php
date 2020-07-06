<?php
namespace backend\controllers;

use backend\models\AuthAssignment;
use backend\models\Profile;
use Yii;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use backend\models\SignupForm;

/**
 * Site controller
 */
class SiteController extends Controller
{
    public $enableCsrfValidation=false;
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error','signup','logout','index','delete'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['admin'],
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['writer'],
                    ],
                   
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
//                   'logout' => ['post'],
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
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        if (!Yii::$app->user->isGuest) {

            return $this->render('index');
        }else{
            return $this->redirect(['login','type'=>'Ok']);
        }
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin($type)
    {$this->layout='login.php';
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        if($type=='noOk'){
            $_SESSION['user_error']='شما اجازه دسترسی ندارید ';
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            $user=AuthAssignment::find()->where(['user_id'=>Yii::$app->user->getId()])->one();
            if($user->item_name=='admin' || $user->item_name=='operator' || $user->item_name=='peyk'){
                return $this->redirect(['index']);
            }else{
                return $this->redirect(['site/logout','type'=>0]);
            }
        } else {
//            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout($type)
    {
        Yii::$app->user->logout();
        if($type==0){

            return $this->redirect(['login','type'=>'noOk']);
        }else{

            return $this->redirect(['login','type'=>'Ok']);
        }

    }

    public function actionSignup(){
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())){
            if ($user=$model->signup()){
                return $this->goHome();
            }
        }
        $role=['admin'=>'ادمین','user'=>'کاربر عادی','repairman'=>'تعمیرکار','writer'=>'اپراتور'];
        return $this->render('signup',[
            'model'=>$model,
            'role'=>$role,
        ]);
    }
}
