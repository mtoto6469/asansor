<?php

namespace backend\controllers;

use backend\models\Post;
use Yii;
use backend\models\Tblpostcategory;
use backend\models\TblpostcategorySearch;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TblpostcategoryController implements the CRUD actions for Tblpostcategory model.
 */
class TblpostcategoryController extends Controller
{
    public $enableCsrfValidation=false;
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access'=>[
                'class'=>AccessControl::className(),
                'only'=>['index', 'delete','update','view','create','error'],
                'rules'=>[
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
     * Lists all Tblpostcategory models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TblpostcategorySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Tblpostcategory model.
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
     * Creates a new Tblpostcategory model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Tblpostcategory();
        $postcat=ArrayHelper::map(Tblpostcategory::find()->where(['enable'=>1])->andWhere(['enable_view'=>1])->all(),'id','title');

        if ($model->load(Yii::$app->request->post())) {
            if ($model->id_parent==null){
                $model->id_parent=0;
            }
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'postcat'=>$postcat,
        ]);
    }

    /**
     * Updates an existing Tblpostcategory model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $postcat=ArrayHelper::map(Tblpostcategory::find()->where(['enable_view'=>1])->all(),'id','title');

        if ($model->load(Yii::$app->request->post())) {
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }else{
            return $this->render('update', [
                'model' => $model,
                'postcat'=>$postcat,
            ]);
        }
    }

    public function Deleteall($id_parent){
        $postcat=Tblpostcategory::find()->where(['id_parent'=>$id_parent])->all();
        foreach ($postcat as $pc){
            $post=Post::find()->where(['id_postcategory'=>$pc])->all();
            foreach ($post as $p){
                $p->enable_view=0;
                $p->save();
            }
            $pc->enable_view=0;
            $pc->save();
            $this->Deleteall($pc->id);
        }

    }

    /**
     * Deletes an existing Tblpostcategory model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model=$this->findModel($id);
        $this->Deleteall($id);
        $post=Post::find()->where(['id_postcategory'=>$this->id])->all();
        foreach ($post as $p){
            $p->enable_view=0;
            $p->save();
        }
        $model->enable_view=0;
        $model->save();
        return $this->redirect(['index']);
    }

    /**
     * Finds the Tblpostcategory model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tblpostcategory the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tblpostcategory::findOne($id)) !== null) {
            return $model;
        }else{
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
