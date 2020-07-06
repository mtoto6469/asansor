<?php

namespace backend\controllers;

use backend\models\Factor;
use backend\models\Profile;
use backend\models\Tblexit;
use backend\models\Tblproduct;
use common\models\User;
use frontend\models\Bag;
use Yii;
use backend\models\Pardakht;
use backend\models\PardakhtSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PardakhtController implements the CRUD actions for Pardakht model.
 */
class PardakhtController extends Controller
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
     * Lists all Pardakht models.
     * @return mixed
     */
    public function actionIndex($confirm)
    {
        $searchModel = new PardakhtSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams,$confirm);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Pardakht model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
      $model = $this->findModel($id);
        return $this->render('view', [
            'model'=>$model,

        ]);
    }

    /**
     * Creates a new Pardakht model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $model = $this->findModel($id);
        $factor=0;
        $user=User::find()->where(['id'=>$model->id_user])->one();
        if ($model->id_fac==0){
            $model->enable_view=0;
            $model->approve=0;
            $model->save();
            if ($model->load(Yii::$app->request->post())) {
                $model->save();
                return $this->redirect(['index', 'confirm' => 1]);
            }else{
                return $this->render('create', [
                    'model' => $model,
                    'factor'=>$factor,
                    'user'=>$user,
                ]);
            }
        }else{
            $factor=Factor::find()->where(['id'=>$model->id_fac])->one();
            $user=User::find()->where(['id'=>$factor->id_user])->one();
            $model->enable_view=0;
            $model->save();
            $factor->confirm=1;
            $bag=Bag::find()->where(['id_fac'=>$factor->id])->all();
            foreach ($bag as $b){
                $count=0;
                $pro=Tblproduct::find()->where(['id'=>$b->id_pro])->one();
                $exit=Tblexit::find()->where(['id_pro'=>$pro->id])->one();
                
                if ($exit){
                    $count=$b->count;
                }
                $exit->exit=$count;
                $exit->save();
            }
            $factor->save();
            $bag=Bag::find()->where(['id_fac'=>$factor->id])->all();
            foreach ($bag as $b){
                $b->id_fac=0;
                $b->down_buy=0;
                $b->save();
            }
            if ($model->load(Yii::$app->request->post())){
                $model->save();
                return $this->render('create',[
                    'model'=>$model,
                    'factor'=>$factor,
                    'user'=>$user,
                ]);
            }
        }
    }

    /**
     * Updates an existing Pardakht model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->id_fac==null) {
            echo 'no factor';
        }elseif ($model->id_fac==0){
            $model->approve=1;
            $model->enable_view=0;
            $model->save();
            $pro=Profile::find()->where(['id_user'=>$model->id_user])->one();
            $pro->id_credit=$model->price;
            $pro->save();
            return $this->redirect(['index','confirm'=>1]);
        }else{
            $factor=Factor::find()->where(['id'=>$model->id_fac])->one();
            $model->enable_view=0;
            $model->save();
            $factor->confirm=1;
            $factor->price=0;
            if ($factor->save()){
                return $this->redirect(['factor/index','visibel'=>0,'resive'=>0,'print'=>0]);
            }
        }


        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Pardakht model.
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
     * Finds the Pardakht model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Pardakht the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Pardakht::findOne($id)) !== null) {
            return $model;
        }else{
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
