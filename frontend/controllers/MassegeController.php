<?php

namespace frontend\controllers;

use common\components\jdf;
use Yii;
use frontend\models\Massege;
use frontend\models\MassegeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MassegeController implements the CRUD actions for Massege model.
 */
class MassegeController extends Controller
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
     * Lists all Massege models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new MassegeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Massege model.
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
     * Creates a new Massege model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Massege();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {

        }
        if (Yii::$app->request->post()){
            if (!Yii::$app->user->isGuest){
                $model->id_user=Yii::$app->user->getId();
            }
            if (isset($_POST['text'])){
                $model->text=$_POST['Masseage-text'];
            }
//            if (isset($_POST['Masseage-id_pro'])){
//                $model->id_pro=$_POST['Masseage-id_pro'];
//            }
            $date=new jdf();
            $model->date=date('Y/m/d');
            $model->date_ir=$date->date('Y/m/d');
            $model->save();
//            var_dump($model->getErrors());exit;
            $_SESSION['massage']='پیام شما با موفقیت ثبت شد';
            return $this->redirect(['massege/create']);
        }


//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->id]);
//        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    public function actionCreatehidro()
    {
        $model = new Massege();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {

        }
        if (Yii::$app->request->post()){
            if (!Yii::$app->user->isGuest){
                $model->id_user=Yii::$app->user->getId();
            }
//            if (isset($_POST['text'])){
//                $model->text=$_POST['Masseage-text'];
//            }
//            if (isset($_POST['Masseage-id_pro'])){
//                $model->id_pro=$_POST['Masseage-id_pro'];
//            }
            $date=new jdf();
            $model->date=date('Y/m/d');
            $model->date_ir=$date->date('Y/m/d');
            $model->save();
//            var_dump($model->getErrors());exit;
            $_SESSION['massage']='پیام شما با موفقیت ثبت شد';
            return $this->redirect(['massege/createhidro']);
        }


//        if ($model->load(Yii::$app->request->post()) && $model->save()) {
//            return $this->redirect(['view', 'id' => $model->id]);
//        }

        return $this->render('createhidro', [
            'model' => $model,
        ]);
    }


    /**
     * Updates an existing Massege model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Massege model.
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
     * Finds the Massege model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Massege the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Massege::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
