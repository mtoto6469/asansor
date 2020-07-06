<?php

namespace frontend\controllers;

use backend\models\Service;
use common\components\jdf;
use Yii;
use frontend\models\Servicebuy;
use frontend\models\ServicebuySearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ServicebuyController implements the CRUD actions for Servicebuy model.
 */
class ServicebuyController extends Controller
{

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Servicebuy models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ServicebuySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Servicebuy model.
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
     * Creates a new Servicebuy model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {

//        $this->layout="profile.php";
        $model = new Servicebuy();
//        $serviceid=$_GET['id'];
        $server=\frontend\models\Service::find()->where(['id'=>$id])->one();
//        var_dump($model->getErrors());exit;
        if ($model->load(Yii::$app->request->post()) ) {

        $date=new jdf();
        $model->date=date('Y/m/d');
        $model->date_ir=$date->date('Y/m/d');
            $model->time=date('Y/m/s');
            $model->time_ir=$date->date('h:m:s');
        $model->id_user=Yii::$app->user->getId();
            $model->id_service=$server->id;
//        $model->save();

        $_SESSION['massage']='سفارش شما با موفقیت ثبت شد';
        return $this->render('create', [
            'model' => $model,
            'server' =>$server,

        ]);
    }
        return $this->render('create', [
            'model' => $model,
            'server' =>$server,

        ]);
        }

    /**
     * Updates an existing Servicebuy model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) ) {
//            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Servicebuy model.
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
     * Finds the Servicebuy model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Servicebuy the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Servicebuy::findOne($id)) !== null) {
            return $model;
        }else{
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
