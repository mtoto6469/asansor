<?php

namespace backend\controllers;

use backend\models\Upload;
use Yii;
use backend\models\Images;
use backend\models\ImagesSearch;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ImagesController implements the CRUD actions for Images model.
 */
class ImagesController extends Controller

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
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Images models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ImagesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Images model.
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
     * Creates a new Images model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Images();
        $modelup=new Upload();

        if ($model->load(Yii::$app->request->post()) ) {

            $modelup -> imageFile=UploadedFile::getInstance($modelup,'imageFile');
            if ($modelup->imageFile !=null){
                if ($modelup->validate()){


                    $modelup->imageFile->saveAs(Yii::getAlias('@upload').'/upload/'.$modelup->imageFile->baseName.'.'.$modelup->imageFile->extension);
                    
                    $model->name=$modelup->imageFile->baseName.'.'.$modelup->imageFile->extension;
                   if ($model->save()) {
                       return $this->redirect(['view', 'id' => $model->id]);
                   }else{
                       return $this->render('create', [
                           'model' => $model,
                           'modelup'=>$modelup,
                        ]);
                   }
                }else{
                    return $this->render('create', [
                        'model' => $model,
                        'modelup'=>$modelup,
                    ]);
                }
            }else{
                return $this->render('create', [
                    'model' => $model,
                    'modelup'=>$modelup,
                ]);
            }
            

        }else{

            return $this->render('create', [
                'model' => $model,
                'modelup'=>$modelup,
            ]);
        }
    }

    /**
     * Updates an existing Images model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $modelup=new Upload();

        if ($model->load(Yii::$app->request->post())) {
            $modelup->imageFile=UploadedFile::getInstance($modelup,'imageFile');
            if ($modelup->imageFile !=null){
                if ($modelup->validate()){
                    $modelup->imageFile->saveAs(Yii::getAlias('@upload'.'/upload/'.$modelup->imageFile->baseName . '.' . $modelup->imageFile->extension));
                    $model->name=$modelup->imageFile->baseName . '.' . $modelup->imageFile->extension;
                    $model->save();
                    return $this->redirect(['view', 'id' => $model->id]);
                }else{
                    return $this->render('update', [
                        'model' => $model,
                        'modelup'=>$modelup,
                    ]);
                }
            }else{
                return $this->render('update', [
                    'model' => $model,
                    'modelup'=>$modelup,
                ]); 
            }
            
        }else{
            return $this->render('update', [
                'model' => $model,
                'modelup'=>$modelup,
            ]);
        }

    }

    /**
     * Deletes an existing Images model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model=$this->findModel($id);
        $model->enable_view=0;
        $model->save();
       unlink(Yii::getAlias('@upload') . '/upload/'.$model->name);

        return $this->redirect(['index']);
    }

    /**
     * Finds the Images model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Images the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Images::findOne($id)) !== null) {
            return $model;
        }else{
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
