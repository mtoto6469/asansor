<?php

namespace backend\controllers;

use backend\models\Factor;
use backend\models\Tblproduct;
use common\models\User;
use frontend\models\Bag;
use Yii;
use backend\models\Deliveryman;
use backend\models\DeliverymanSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * DeliverymanController implements the CRUD actions for Deliveryman model.
 */
class DeliverymanController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public $enableCsrfValidation=false;
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
     * Lists all Deliveryman models.
     * @return mixed
     */
    public function actionIndex($confirm)
    {
        $searchModel = new DeliverymanSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams,$confirm);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Deliveryman model.
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
     * Creates a new Deliveryman model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Deliveryman();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
        
//        $confirm=0;
//        $user=User::find()->where(['id'=>$model->id_devliveryman])->one();
//        if ($model->id_factor==0){
//            $model->enable_view=0;
//            $model->approve=0;
//            $model->save();
//            if ($model->load(Yii::$app->request->post())){
//                if ($model->save()){
//                    return $this->redirect(['index','confirm'=>1]);
//                }else{
//                    return $this->render('create', [
//                        'model' => $model,
//                        'confirm'=>$confirm,
//                        'user'=>$user,
//                    ]);
//                }
//            }else{
//                return $this->render('create', [
//                    'model' => $model,
//                    'confirm'=>$confirm,
//                    'user'=>$user,
//                ]);
//            }
//        }else{
//           $confirm=Factor::find()->where(['id'=>$model->id_factor])->one();
//            $user=User::find()->where(['id'=>$confirm->id])->one();
//            $model->enable_view=0;
//            $model->save();
//            $confirm->$confirm=1;
//            $bag=Bag::find()->where(['if_fac'=>$confirm->id])->all();
//            foreach ($bag as $b){
//                $count=0;
//                $pro=Tblproduct::find()->where(['id'=>$b->id_pro])->one();
//
//            }
//        }
    }

    /**
     * Updates an existing Deliveryman model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->confirm=1;
        if ($model->save()){
            return $this->redirect(['index','confirm'=>$model->confirm]);
        }
    }

    /**
     * Deletes an existing Deliveryman model.
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
     * Finds the Deliveryman model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Deliveryman the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Deliveryman::findOne($id)) !== null) {
            return $model;
        }else{
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
