<?php

namespace backend\controllers;

use backend\models\Tblproduct;
use Yii;
use backend\models\Tblexit;
use backend\models\TblexitSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * TblexitController implements the CRUD actions for Tblexit model.
 */
class TblexitController extends Controller
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
     * Lists all Tblexit models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new TblexitSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Tblexit model.
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
     * Creates a new Tblexit model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Tblexit();
        $pro=ArrayHelper::map(Tblproduct::find()->where(['enable_view'=>1])->all(),'id','title');

        if ($model->load(Yii::$app->request->post()) ) {
            $chek=Tblexit::find()->where(['id_pro'=>$model->id_pro])->one();
            if ($chek==null){
                $model->save();
            }else{
                return $this->render('create', [
                    'model' => $model,
                    'pro'=>$pro,
                ]);
            }
            return $this->redirect(['view', 'id' => $model->id]);
        }else{
            return $this->render('create', [
                'model' => $model,
                'pro'=>$pro,
            ]);
        }
    }

    /**
     * Updates an existing Tblexit model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $pro=ArrayHelper::map(Tblproduct::find()->all(),'id','name');

        if ($model->load(Yii::$app->request->post()) ) {
            $model->save();
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'pro'=>$pro,
        ]);
    }

    /**
     * Deletes an existing Tblexit model.
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

        return $this->redirect(['index']);
    }

    /**
     * Finds the Tblexit model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Tblexit the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Tblexit::findOne($id)) !== null) {
            return $model;
        }else{
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
