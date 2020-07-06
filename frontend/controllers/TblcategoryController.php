<?php

namespace frontend\controllers;

use backend\models\Images;
use backend\models\Post;
use backend\models\Tblproduct;
use Yii;
use frontend\models\Tblcategory;
use frontend\models\TblcategorySearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TblcategoryController implements the CRUD actions for Tblcategory model.
 */
class TblcategoryController extends Controller
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
     * Lists all Tblcategory models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TblcategorySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Tblcategory model.
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
     * Creates a new Tblcategory model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Tblcategory();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Tblcategory model.
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
     * Deletes an existing Tblcategory model.
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
     * Finds the Tblcategory model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tblcategory the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tblcategory::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
    public function actionCat($id){
//        $this->layout="profile.php";
        $category1=Tblcategory::find()->all();
        $cat=Tblcategory::find()->where(['id'=>$id])->one();
        $product=Tblproduct::find()->all();
        $pro=Tblproduct::find()->where(['id_category'=>$id])->all();
//        var_dump($pro);exit();
        return $this->render('cate' ,[
            'cat'=>$cat,
            'id'=>$id,
            'category1'=>$category1,
            'product'=>$product,
            'pro'=>$pro,

        ]);

//        $url = \yii::$app->urlManager;
//        \Yii::$app->view->registerMetaTag([
//            'name' => 'description',
//            'content' =>'آسانسور',
//        ]);
//        \Yii::$app->view->registerMetaTag([
//            'name' => 'keyword',
//            'content' => 'mata_key',
//        ]);
//        \Yii::$app->view->registerMetaTag([
//            'property' => 'og:title',
//            'content' => '',
//        ]);
//        \Yii::$app->view->registerMetaTag([
//            'property' => 'og:url',
//            'content' => $url->hostInfo,
//        ]);
//        \Yii::$app->view->registerMetaTag([
//            'property' => 'og:site_name',
//            'content' => '',
//        ]);
//        \Yii::$app->view->registerMetaTag([
//            'property' => 'og:local',
//            'content' => 'fa-IR',
//        ]);
//
//        \Yii::$app->view->registerMetaTag([
//            'property' => ' DC.date.issued',
//            'content' => \date('Y-m-d'),
//        ]);
   }
    public function actionEnfo_product($id)
    {
//        $productid = $_GET['id'];
        $product = Tblproduct::find()->where(['id' => $id])->andWhere(['enable_view' => 1])->andWhere(['enable' => 1])->all();
        return $this->render('enfo_product', [
            'product' => $product,
        ]);

   

    }

}


