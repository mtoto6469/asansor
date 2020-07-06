<?php

namespace backend\controllers;

use common\models\User;
use Yii;
use backend\models\Profile;
use backend\models\ProfileSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\components\jdf;

/**
 * ProfileController implements the CRUD actions for Profile model.
 */
class ProfileController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'delete','update','view','create','error'],
                'rules' => [

                    [
                        'actions' => ['index', 'delete','update','view','create'],
                        'allow' => true,
                        'roles' => ['admin'],
                    ],

                    [
                        'actions' => ['error'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['error'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],

            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
//                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Profile models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProfileSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Profile model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Profile model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Profile();
        $role=['admin'=>'مدیر کل','repairman'=>'تعمیرکار','deliveryman'=>'پستچی','writer'=>'منشی','user'=>'کاربر'];

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'role'=>$role,
        ]);
    }

    /**
     * Updates an existing Profile model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $user=User::find()->where(['id'=>$model->id_user])->one();
        $role=['admin'=>'مدیر کل','repairman'=>'تعمیرکار','deliveryman'=>'پستچی','writer'=>'منشی','user'=>'کاربر'];

        if ($model->load(Yii::$app->request->post()) ) {
            if ($model->cred==null){
//                $model->account_balance=$model->account_balance+$model->credit;
            }else{
                $model->credit=$model->credit+$model->cred;
                $model->account_balance=$model->account_balance+$model->cred;
            }
            $data = new jdf();
            $model->date=date('Y/m/d');
//            $model->date_ir=$data->date('Y/m/d');
////            $model->time = date('Y/m/d');
////            $model->time_ir = $data->date('h:m/s');
           $model->date_credit=date('Y/m/d');
            
            if ($model->password!=null){
                $user->setPassword($model->password);
            }
            $user->username=$_POST['Profile']['username'];
            $user->save();
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
            
        }else{
            $data = new jdf();
            $model->date= date('Y/m/d');
            $model->date_credit=$data->date('Y/m/d');

            return $this->render('update', [
                'model' => $model,
                'role'=>$role,
            ]);
        }
    }

    /**
     * Deletes an existing Profile model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Profile model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Profile the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Profile::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
