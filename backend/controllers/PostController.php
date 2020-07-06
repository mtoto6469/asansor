<?php

namespace backend\controllers;

use backend\models\Images;
use backend\models\Tblpostcategory;
use common\components\jdf;
use Yii;
use backend\models\Post;
use backend\models\PostSearch;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PostController implements the CRUD actions for Post model.
 */
class PostController extends Controller
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
                'only' => ['index', 'delete','update','view','create'],
                'rules' => [

                    [
                        'actions' => ['index', 'delete','update','view','create'],
                        'allow' => true,
                        'roles' => ['admin'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [

                ],
            ],
        ];
    }

    /**
     * Lists all Post models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PostSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Post model.
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
     * Creates a new Post model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $img=ArrayHelper::map(Images::find()->where(['enable_view'=>1])->all(),'id','name');
        $pcat=ArrayHelper::map(Tblpostcategory::find()->where(['enable'=>1])->andWhere(['enable_view'=>1])->all(),'id','title');
        $model = new Post();

        if ($model->load(Yii::$app->request->post())) {
            $data = new jdf();
            $model->date=date('Y/m/d');
            $model->date_it=$data->date('Y/m/d');
            $model->time = date('Y/m/d');
            $model->time_ir = $data->date('h:m:s');
            $model->id_user=Yii::$app->user->getId();
            if(     $model->save()){
                return $this->redirect(['view', 'id' => $model->id]);
            }
       else{
           
           var_dump($model->getErrors());exit;
       }

//           var_dump($model->id);exit();


        }

        return $this->render('create', [
            'model' => $model,
            'img'=>$img,
            'pcat'=>$pcat,
        ]);
    }

    /**
     * Updates an existing Post model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $img=ArrayHelper::map(Images::find()->where(['enable_view'=>1])->all(),'id','name');
        $pcat=ArrayHelper::map(Tblpostcategory::find()->where(['enable'=>1])->andWhere(['enable_view'=>1])->all(),'id','title');

        if ($model->load(Yii::$app->request->post()) ) {
            $data = new jdf();
            $model->date= date('Y/m/d');
            $model->date_it=$data->date('Y\m\d');
            $model->time = date('Y/m/d');
            $model->time_ir = $data->date('h:m/s');
            $model->save();
            
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'img'=>$img,
            'pcat'=>$pcat,
        ]);
    }

    /**
     * Deletes an existing Post model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
       $model= $this->findModel($id);
        $model->enable_view=0;
        $model->save();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Post model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Post the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Post::findOne($id)) !== null) {
            return $model;
        }else{
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
