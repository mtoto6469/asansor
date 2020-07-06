<?php

namespace backend\controllers;

use backend\models\Images;
use backend\models\Tblproduct;
use Yii;
use backend\models\Tblcategory;
use backend\models\TblcategorySearch;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TblcategoryController implements the CRUD actions for Tblcategory model.
 */
class TblcategoryController extends Controller
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
                'only'=>['index','delete','update','view','create','error'],
                'rules' => [
                    [
                        'actions' => ['index', 'delete','update','view','create'],
                        'allow' => true,
                        'roles'=>['admin'],
                    ],
                    [
                        'actions' => ['error'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions'=>['error'],
                        'allow'=>true,
                        'roles'=>['@']
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
//                    'logout' => ['post'],
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
        $img=Images::find()->filterWhere(['enable_view'=>1])->all();
//        var_dump($img);exit();

        $cat=ArrayHelper::map(Tblcategory::find()->filterWhere(['enable_view'=>1])->all(),'id','name');
//var_dump($cat);exit();

        if ($model->load(Yii::$app->request->post())) {
            if($model->id_parent==null){
                $model->id_parent=0;
            }
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
            }else{
            return $this->render('create', [
                'model' => $model,
                'img'=>$img,
                'cat'=>$cat,
            ]);
        }

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
        $img=Images::find()->filterWhere(['enable_view'=>1])->all();
        $cat=ArrayHelper::map(Tblcategory::find()->filterWhere(['enable_view'=>1])->all(),'id','name');
        if ($model->load(Yii::$app->request->post())) {
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }else{return $this->render('update', [
            'model' => $model,
            'img'=>$img,
            'cat'=>$cat,
        ]);}


    }
    protected function Deleteall($id_parent){
    $cat=Tblcategory::find()->where(['id_parent'=>$id_parent])->all();
    foreach ($cat as $c){
        $pro=Tblproduct::find()->where(['id_category'=>$c])->all();
        foreach ($pro as $p){
            $p->enable_view=0;
            $p->save();
        }
        $c->enable_view=0;
        $c->save();
        $this->Deleteall($c->id);
    }
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
       $model= $this->findModel($id);
        $this->Deleteall($id);
        $pro=Tblproduct::find()->where(['id_category'=>$this->id])->all();
        foreach ($pro as $p){
        $p->enable_view=0;
        $p->save();
    }
        $model->enable_view=0;
        $model->save();
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
        }else{
            throw new NotFoundHttpException('The requested page does not exist.');
        }

        
    }
}
