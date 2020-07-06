<?php

namespace frontend\controllers;

use backend\models\Tblproduct;
use common\models\User;
use frontend\models\Factor;
use Yii;
use frontend\models\Bag;
use frontend\models\BagSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\components\jdf;

/**
 * BagController implements the CRUD actions for Bag model.
 */
$sesstion=yii::$app->session;
if(!$sesstion->isActive){
    $sesstion->open();
}
class BagController extends Controller
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
     * Lists all Bag models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BagSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Bag model.
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
     * Creates a new Bag model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Bag();

        if ($model->load(Yii::$app->request->post())) {
//            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }




    public function actionCart($id)
    {
        $id_pro=$id;
        if(!Yii::$app->user->isGuest){
            $id_user=Yii::$app->user->getId();

            $count_bag=Bag::find()->where(['id_user'=>$id_user,'id_pro'=>$id_pro])->one();

            if($count_bag){
                $count_bag->count=$count_bag->count + 1;
//                var_dump($count_bag->getErrors());exit;
                if ($count_bag->save()){

                    $bag=Bag::find()->all();
                    return $this->render('bag',[
                        'bag'=>$bag,
                    ]);
                }else{
                    $bag=Bag::find()->all();
                    return $this->render('bag',[
                        'bag'=>$bag,
                    ]);
                }


            }
            else{
                $bag=new Bag();
                $bag->id_user=$id_user;
                $bag->id_pro=$id_pro;
                $bag->id_fac=0;
                $bag->count=1;
                $bag->date="dddd";
                $bag->enable_view=1;

                $bag->price=200;
                if($bag->save()){

//                    exit;
                    $bag=Bag::find()->all();
                    return $this->render('bag',[
                        'bag'=>$bag
                    ]);

                }

                else{
                    var_dump($bag->getErrors());
                    exit;
                }


            }
        }

        else{
            return $this->redirect(['/site/index']);
        }


//        $model= new Bag();
//        if (Yii::$app->request->get()){
//            $id_user=Yii::$app->user->getId();
//            $idpro=$id;
//
//
//            if (!Yii::$app->user->isGuest){
//                $model->id_user =Yii::$app->user->getId();
//            }else{
//                $id_user_face=Bag::find()->where(['id_user'=>$id_user,'id_pro'=>$idpro])->all();
//
//
//                $max = 1;
//                foreach ($id_user_face as $iu){
//                    if ($iu->face_id_user >=$max){
//                        $max=$iu->face_id_user;
//                    }
//
//                }
//                $id_user =$max + 1;
//                if (isset($_SESSION ['id_user'])){
//                    if ($_SESSION['id_user']==null){
//                        $model->face_id_user=$id_user;
//                        $_SESSION['id_user']=$id_user;
//                    }  else{
//                        $model->face_id_user=$_SESSION['id_user'];
//                    }
//                }else{
//                    $model->face_id_user=$id_user;
//                    $_SESSION['id_user']=$id_user;
//                }
//            }
//            $model->id_pro=$idpro;
//            $pro=Tblproduct::findOne($idpro);
//            $model->price = $pro->price;
////            $model->id_user=Yii::$app->user->getId();
////            $model->id_user=0;
//            $model->count=1;
//            $model->down_buy=0;
////            $model->down_buy=0;
//           $model->date = date('Y/m/d');
//           $date= new jdf();
//            $model->date_ir=$date->date("Y/m/d");
//           $model->time =date ('Y:m:d');
//            if ($model->save()){
//
//                return $this->redirect(['bag/bag' ]);
//            }else{
//                var_dump($model->getErrors());
//                exit();
//            }
//
////           return $this->redirect(['tblcategory/cate','id_parent' => $produ->id_category, 'id' => $idpro]);
//
//        }else{}

    }

    public  function actionBag()
    {





//        //            در این قسمت چک میشود که چه محصولاتی در جدول bag با توجه به این که کاربر ثبت نام کرده باشد وجود دارد
//        $bag=null;
//
//       $id_user=0;
//        if (!Yii::$app->user->isGuest) {
//            $bag =Bag::find()->where(['down_buy' => 0])->andWhere(['id_user' => Yii::$app->user->getId()])->all();
//            $count = Bag::find()->where(['down_buy' => 0])->andWhere(['id_user' => Yii::$app->user->getId()])->count();
//           echo  $id_user = Yii::$app->user->getId();
//        } else {
//            if (isset($_SESSION['id_user'])) {
//                if ($_SESSION['id_user'] != null) {
//                    $bag = Bag::find()->where(['down_buy' => 0])->andWhere(['face_id_user' => $_SESSION['id_user']])->all();
//                    $count = Bag::find()->where(['down_buy' => 0])->andWhere(['face_id_user' => $_SESSION['id_user']])->count();
//                   echo $id_user = $_SESSION['id_user'];
//                }
//                if (isset($_POST['address'])){
//                    if ($_POST['address']!=null){
//                        $old=Factor::find()->where(['id'=>$_POST['address']])->one();
//
//                    }
//                }
//            } else {
//echo 1;
//            }
//        }
//
//        return $this->render('bag', [
//            'bag' => $bag,
//
//
//        ]);
    }

    public function actionAddprice(){
        $model=new Factor();
        $factor=Factor::find()->where(['id_user'=>Yii::$app->user->getId()])->andWhere(['down_buy'=>0])->all();
        $bag=Bag::find()->where(['id_user'=>Yii::$app->user->getId()])->andWhere(['down_buy'=>0])->all();
        $count=Factor::find()->where(['id_user'=>Yii::$app->user->getId()])->andWhere(['down_buy'=>0])->count();
        foreach ($factor as $f){
            for ($i=1;$i<=$count;$i++){
                $check=Factor::find()->where(['id_user'=>Yii::$app->user->getId()])->andWhere(['down_buy'=>0])->count();
                if($check==0){
                    $f->update();
                    break;
                }
            }
        }
        if( Yii::$app->request->post()) {




            if($_POST['don']=='پرداخت آنلاین'){

                return $this->redirect(['pardakht',

                ]);

            }elseif($_POST['don']=='پرداخت نقدی'){
                return $this->redirect(['pardakht/create']);

            }

        }


        return $this->render('addres1',[
            'model'=>$model,
            'bag'=>$bag,
            'factor'=>$factor,

        ]);
    }


    /**
     * Updates an existing Bag model.
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
     * Deletes an existing Bag model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model=$this->findModel($id);
        $model->delete();

        return $this->redirect(['bag']);

    }

    /**
     * Finds the Bag model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Bag the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Bag::findOne($id)) !== null) {
            return $model;
        }else{
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
