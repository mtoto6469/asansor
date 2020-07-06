<?php

namespace backend\controllers;

use Yii;
use backend\models\Massege;
use backend\models\MassegeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MassegeController implements the CRUD actions for Massege model.
 */
class MassegeController extends Controller
{
    public $enableCsrfValidation = false;
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
//                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Massege models.
     * @return mixed
     */
    public function actionIndex($confirm)
    {
        $searchModel = new MassegeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams,$confirm);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionIndexx($confirm)
    {
        $searchModel = new MassegeSearch();
        $dataProvider = $searchModel->search1(Yii::$app->request->queryParams,$confirm);

        return $this->render('indexx', [
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
            return $this->redirect(['view', 'id' => $model->id,'confirm'=>$model->confirm]);
        }

        return $this->render('create', [
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
        $message=Massege::find()->where(['enable_view'=>1])->andWhere(['id'=>$id])->all();
        $model = $this->findModel($id);
        $model->confirm=1;
        foreach ($message as $m){
            $wel=$m->welldimensions;
            $dis=$m->displacementheight;
            $cap=$m->Capacity;
            $hlf=$m->hlfdc;
            $pit=$m->pit;

        }

        if ($model->load(Yii::$app->request->post()) ) {
            $model->confirm=1;
            $model->pit=$pit;
            $model->hlfdc=$hlf;
            $model->Capacity=$cap;
            $model->displacementheight=$dis;
            $model->welldimensions=$wel;

            if ($model->save()){
                return $this->redirect(['view', 'id' => $model->id]);
            }else{
                return $this->render('update', [
                    'model' => $model,
                ]);
            }

        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionHidrolick()
    {
        $searchModel = new MassegeSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('hidrolick', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
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
        $model=$this->findModel($id);
        $model->enable_view=0;
        $model->save();
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
        }else{
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
