<?php

namespace backend\controllers;

use backend\models\Deliveryman;
use backend\models\Profile;
use frontend\models\Bag;
use Yii;
use backend\models\Factor;
use backend\models\FactorSearch;
use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FactorController implements the CRUD actions for Factor model.
 */
class FactorController extends Controller
{
    public $enableCsrfValidation = false;
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'delete','update','view','create','error'],
                'rules' => [

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
     * Lists all Factor models.
     * @return mixed
     */
    public function actionIndex($resive,$visibel,$print)
    {
        $searchModel = new FactorSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams,$resive,$visibel,$print);
//        var_dump($dataProvider);exit();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Factor model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $model=$this->findModel($id);
        $bag=Bag::find()->where(['id_fac'=>$id])->all();
        $deliveryman= new Deliveryman();
        $id_delivery=ArrayHelper::map(Profile::find()->where(['role'=>'deliveryman'])->all(),'id_user','username');
        if ($deliveryman->load(Yii::$app->request->post())){
            $deliveryman->id_factor=$id;
            $deliveryman->user_address=$model->address;
            $deliveryman->user_tel=$model->telephone;
            if ($model->save()){
                $model->resive=1;
                if ($model->save()){
                    return $this->redirect(['index',
                        'resive'=>$model->resive,
                        'visibel'=>$model->visibel,
                        'print'=>$model->print,
                    ]);
                }else{
                    return $this->render('view', [
                        'model' => $model,
                        'bag'=>$bag,
                        'deliveryman'=>$deliveryman,
                        'id_delivery'=>$id_delivery,
                    ]);
                }

            }else{
                return $this->render('view', [
                    'model' => $model,
                    'bag'=>$bag,
                    'deliveryman'=>$deliveryman,
                    'id_delivery'=>$id_delivery,
                ]);
            }
        }
        return $this->render('view', [
            'model' => $model,
            'bag'=>$bag,
//            'deliveryman'=>$deliveryman,
//            'id_delivery'=>$id_delivery,
        ]);
    }

    /**
     * Creates a new Factor model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Factor();

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()){
                return $this->redirect(['view', 'id' => $model->id]);
            }else{
                return $this->render('create', [
                    'model' => $model,
                ]);
            }

        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Factor model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id,$resive,$visibel,$print)
    {
        $model = $this->findModel($id );

        if ($resive==0 && $visibel==0){
            $model->visibel=1;
            $p=0;
            $model->save();
        }
        if ($resive==0 && $visibel==1 && $print==1){
            $model->resive=1;
            $p=1;
            $model->save();
        }
        if ($resive==0 && $print==0 && $visibel==1){
            $model->print=1;
            $model->save();
            $p=0;
        }

        return $this->render('update', [
            'visibel' => $visibel,
            'resive'=>$resive,
            'print'=>$p,
            'model'=>$model,
        ]);
    }
    
    public function actionBackresive($id){
        $model=$this->findModel($id);
        $model->resive=0;
        $model->save();
        
        return $this->redirect(['index',
            'resive'=>$model->resive,
            'visibel'=>$model->visibel,
            'print'=>$model->print,
        ]);
    }
    
    
    
    public function actionBack_resive($id)
    {
        $model=$this->findModel($id);
        $model->resive=0;
        $model->save();
        
        return $this->redirect(['index',
            'resive'=>$model->visibel,
            'visibel'=>$model->visibel,
            'print'=>$model->print,
        ]);
    }

    /**
     * Deletes an existing Factor model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
       $model= $this->findModel($id);
        $model->enable_view=0;

        return $this->redirect(['index',
            'resive'=>1,
            'visible'=>1,
            'print'=>1,
        ]);
    }

    /**
     * Finds the Factor model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Factor the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Factor::findOne($id)) !== null) {
            return $model;
        }else{
            throw new NotFoundHttpException('The requested page does not exist.'); 
        }
    }
}
