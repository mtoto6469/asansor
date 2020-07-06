<?php
namespace frontend\controllers;

use backend\models\Images;
use backend\models\Post;
use backend\models\Priceforelevator;
use backend\models\Project;
use backend\models\Service;
use backend\models\Tblcategory;
use common\components\jdf;
use common\models\User;
use frontend\models\Bag;
use frontend\models\Learn;
use frontend\models\Massege;
use frontend\models\Profile;
use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup','profile'],
                'rules' => [
                    [
                        'actions' => ['signup','profile'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout','profile'],
                        'allow' => true,
                        'roles' => ['@'],
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
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        
        $url = \yii::$app->urlManager;
        \Yii::$app->view->registerMetaTag([
            'name' => 'description',
            'content' =>'آسانسور',
        ]);
        \Yii::$app->view->registerMetaTag([
            'name' => 'keyword',
            'content' => '',
        ]);
        \Yii::$app->view->registerMetaTag([
            'property' => 'og:title',
            'content' => '',
        ]);
        \Yii::$app->view->registerMetaTag([
            'property' => 'og:url',
            'content' => $url->hostInfo,
        ]);
        \Yii::$app->view->registerMetaTag([
            'property' => 'og:site_name',
            'content' => 'شرکت پایدار نیرو آسانبر ',
        ]);
        \Yii::$app->view->registerMetaTag([
            'property' => 'og:local',
            'content' => 'fa-IR',
        ]);

        \Yii::$app->view->registerMetaTag([
            'property' => ' DC.date.issued',
            'content' => \date('Y-m-d'),
        ]);




//  exit;
        $slider=Images::find()->filterWhere(['enable_view'=>1])->andWhere(['slide'=>1])->all();
//        $articleimg=Images::find()->filterWhere(['enable_view'=>1])->andWhere(['indpage'=>1])->all();
        $article=Post::find()->where(['enable_view'=>1])->andWhere(['indpage'=>1])->limit(9)->all();
        $slider1=Project::find()->where(['enable_view'=>1])->andWhere(['enable'=>1])->andWhere(['slider'=>1])->all();

        $user=User::findOne(Yii::$app->user->getId());
//        $profile=Profile::findOne(['id_user'=>Yii::$app->user->getId()]);
//        echo $profile->name;
//        echo '<br>';
//        echo $user->username;

        return $this->render('index',[
            'slider'=>$slider,
            'article'=>$article,
            'slider1'=>$slider1,
//            'articleimg'=>$articleimg,

        ]);
    }

    

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
//        $this->layout='login.php';
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            if(isset($_SESSION['user_id'])){
                if($_SESSION['user_id']!=null){
                    $bag=Bag::find()->where(['face_id_user'=>$_SESSION['user_id']])->all();
                    if($bag !=null){
                        foreach ($bag as $b){
                            $b->id_user=Yii::$app->user->getId();
                            $b->face_id_user=null;
                            $b->save();
                        }
                    }

                }else{
                    $_SESSION['user_id']=null;
                }
            }else{
                return $this->goBack();
            }
            return $this->goBack();
        } else {


            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $url = \yii::$app->urlManager;
        \Yii::$app->view->registerMetaTag([
            'name' => 'description',
            'content' =>'آسانسور',
        ]);
        \Yii::$app->view->registerMetaTag([
            'name' => 'keyword',
            'content' => '',
        ]);
        \Yii::$app->view->registerMetaTag([
            'property' => 'og:title',
            'content' => '',
        ]);
        \Yii::$app->view->registerMetaTag([
            'property' => 'og:url',
            'content' => $url->hostInfo,
        ]);
        \Yii::$app->view->registerMetaTag([
            'property' => 'og:site_name',
            'content' => 'شرکت پایدار نیرو آسانبر ',
        ]);
        \Yii::$app->view->registerMetaTag([
            'property' => 'og:local',
            'content' => 'fa-IR',
        ]);

        \Yii::$app->view->registerMetaTag([
            'property' => ' DC.date.issued',
            'content' => \date('Y-m-d'),
        ]);


//        $model = new Massege();
//        if ($model->load(Yii::$app->request->post()) ) {
//
//            if (!Yii::$app->user->isGuest) {
//                $model->id_user = Yii::$app->user->getId();
//            }
//
//            $date = new jdf();
//            $model->date = date('Y/m/d');
//            $model->date_ir = $date->date('Y/m/d');
//            $model->save();
//
//            $_SESSION['massage'] = 'پیام شما با موفقیت ثبت شد';
//            return $this->render('contact', [
//                'model' => $model
//            ]);
//        }else{
//            return $this->render('contact',[
//                'model'=>$model,
//            ]);
//        }

//        $model = new ContactForm();
//
//        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
//            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
//                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
//            } else {
//                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
//
//
//                return $this->refresh();
//            }
//        }else {
//                return $this->render('contact', [
//                    'model' => $model,
//                ]);
//            }
//
}

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();

        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }
        return $this->render('signup', [
            'model' => $model,

          
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }
        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    public function actionInquiry_price(){

        $url = \yii::$app->urlManager;
        \Yii::$app->view->registerMetaTag([
            'name' => 'description',
            'content' =>'آسانسور',
        ]);
        \Yii::$app->view->registerMetaTag([
            'name' => 'keyword',
            'content' => '',
        ]);
        \Yii::$app->view->registerMetaTag([
            'property' => 'og:title',
            'content' => '',
        ]);
        \Yii::$app->view->registerMetaTag([
            'property' => 'og:url',
            'content' => $url->hostInfo,
        ]);
        \Yii::$app->view->registerMetaTag([
            'property' => 'og:site_name',
            'content' => 'شرکت پایدار نیرو آسانبر ',
        ]);
        \Yii::$app->view->registerMetaTag([
            'property' => 'og:local',
            'content' => 'fa-IR',
        ]);

        \Yii::$app->view->registerMetaTag([
            'property' => ' DC.date.issued',
            'content' => \date('Y-m-d'),
        ]);


        $floor=$_GET['floorNamber'];
        $floor1=Priceforelevator::find()->where(['floorNamber'=>$floor])->andWhere(['enable'=>1])->andWhere(['enable_view'=>1])->all();
        return $this->render('inquiry_price',[
                'floor1'=>$floor1,
            ]);
    }

    public function actionInquiry_floor_number()
    {
        $url = \yii::$app->urlManager;
        \Yii::$app->view->registerMetaTag([
            'name' => 'description',
            'content' =>'آسانسور',
        ]);
        \Yii::$app->view->registerMetaTag([
            'name' => 'keyword',
            'content' => '',
        ]);
        \Yii::$app->view->registerMetaTag([
            'property' => 'og:title',
            'content' => '',
        ]);
        \Yii::$app->view->registerMetaTag([
            'property' => 'og:url',
            'content' => $url->hostInfo,
        ]);
        \Yii::$app->view->registerMetaTag([
            'property' => 'og:site_name',
            'content' => 'شرکت پایدار نیرو آسانبر ',
        ]);
        \Yii::$app->view->registerMetaTag([
            'property' => 'og:local',
            'content' => 'fa-IR',
        ]);

        \Yii::$app->view->registerMetaTag([
            'property' => ' DC.date.issued',
            'content' => \date('Y-m-d'),
        ]);


        return $this->render('inquiry_floor_number');
    }
    public function actionHydraulic_lift()
    {
        $url = \yii::$app->urlManager;
        \Yii::$app->view->registerMetaTag([
            'name' => 'description',
            'content' =>'آسانسور',
        ]);
        \Yii::$app->view->registerMetaTag([
            'name' => 'keyword',
            'content' => '',
        ]);
        \Yii::$app->view->registerMetaTag([
            'property' => 'og:title',
            'content' => '',
        ]);
        \Yii::$app->view->registerMetaTag([
            'property' => 'og:url',
            'content' => $url->hostInfo,
        ]);
        \Yii::$app->view->registerMetaTag([
            'property' => 'og:site_name',
            'content' => 'شرکت پایدار نیرو آسانبر ',
        ]);
        \Yii::$app->view->registerMetaTag([
            'property' => 'og:local',
            'content' => 'fa-IR',
        ]);

        \Yii::$app->view->registerMetaTag([
            'property' => ' DC.date.issued',
            'content' => \date('Y-m-d'),
        ]);


        return $this->render('hydraulic_lift');
    }
    public function actionService_maintenance(){
//        $service1=Service::find()->where(['enable_view'=>1])->andWhere(['enable'=>1])->one();
        return $this->render('service_maintenance',[
//            'service1'=>$service1,
           ]);
    }
    public function actionProfile(){
        $this->layout="profile.php";
        $model=new  Profile();
        $model=$model->find()->where(['id_user'=>Yii::$app->user->getId()])->one();
        if($model->load(Yii::$app->request->post())&& $model->save()){
            return $this->goHome();
        }
        return $this->render('profile',[
            'model'=>$model,
        ]);

    }
    public function actionPost($id){
        $model=Post::find()->where(['id'=>$id])->one();
        $url = \yii::$app->urlManager;
        if ($model == null) {
//            throw new NotFoundHttpException();
        }
//        if ($model->mata_tag!=null){
//            \Yii::$app->view->registerMetaTag([
//                'name' => 'description',
//                'content' =>$model->mata_tag,
//            ]);
//        }else{
//            \Yii::$app->view->registerMetaTag([
//                'name' => 'description',
//                'content' =>'',
//            ]);
//        }
//        if ($model->mata_key !=null){
//            \Yii::$app->view->registerMetaTag([
//                'name' => 'keyword',
//                'content' => $model->mata_key,
//            ]);
//        }else{
//            \Yii::$app->view->registerMetaTag([
//                'name' => 'keyword',
//                'content' => '',
//            ]);
//        }
//        if ($model->meta_text !=null){
//            \Yii::$app->view->registerMetaTag([
//                'name' => 'keytext',
//                'content' => $model->meta_text,
//            ]);
//        }else{
//            \Yii::$app->view->registerMetaTag([
//                'name' => 'keytext',
//                'content' => '',
//            ]);
//        }
//        if ($model->meta_title !=null){
//            \Yii::$app->view->registerMetaTag([
//                'property' => 'og:title',
//                'content' => $model->meta_title,
//            ]);
//        }else{
//            \Yii::$app->view->registerMetaTag([
//                'property' => 'og:title',
//                'content' => '',
//            ]);
//        }


        \Yii::$app->view->registerMetaTag([
            'property' => 'og:url',
            'content' => $url->hostInfo,
        ]);
        \Yii::$app->view->registerMetaTag([
            'property' => 'og:site_name',
            'content' => 'شرکت پایدار نیرو آسانبر ',
        ]);
        \Yii::$app->view->registerMetaTag([
            'property' => 'og:local',
            'content' => 'fa-IR',
        ]);

        \Yii::$app->view->registerMetaTag([
            'property' => ' DC.date.issued',
            'content' => \date('Y-m-d'),
        ]);



//        $postid=$_GET['id'];
//        var_dump($postid);
        $post=Post::find()->where(['id_postcategory'=>$id])->andWhere(['enable_view'=>1])->andWhere(['enable'=>1])->all();
        return $this->render('post',[
            'post'=>$post,
        ]);
    }
    public function actionLearn($id){

        $model=Post::find()->where(['id'=>$id])->one();
        $url = \yii::$app->urlManager;
        if ($model == null) {
//            throw new NotFoundHttpException();
        }

        \Yii::$app->view->registerMetaTag([
            'property' => 'og:url',
            'content' => $url->hostInfo,
        ]);
        \Yii::$app->view->registerMetaTag([
            'property' => 'og:site_name',
            'content' => 'شرکت پایدار نیرو آسانبر ',
        ]);
        \Yii::$app->view->registerMetaTag([
            'property' => 'og:local',
            'content' => 'fa-IR',
        ]);

        \Yii::$app->view->registerMetaTag([
            'property' => ' DC.date.issued',
            'content' => \date('Y-m-d'),
        ]);



//        $postid=$_GET['id'];
//        var_dump($postid);
        $learn=Learn::find()->where(['enable_view'=>1])->andWhere(['enable'=>1])->andWhere(['id'=>$id])->all();
        return $this->render('learn',[
            'learn'=>$learn,
        ]);
    }
    
    
    public function actionProjects(){
        $statuse=$_GET['statuse'];
        if ($statuse !=null){
            if ($statuse==1){
                $proj=Project::find()->where(['enable_view'=>1])->andWhere(['enable'=>1])->andWhere(['statuse'=>1])->all();
            }
            elseif ($statuse==2){
                $proj=Project::find()->where(['enable_view'=>1])->andWhere(['enable'=>1])->andWhere(['statuse'=>2])->all();
            }
        }
        return $this->render('projects',[
            'proj'=>$proj,
//            'proj1'=>$proj1,


        ]);
       

    }
    public function actionProject(){
        $id=$_GET['id'];
        $project=Project::find()->where(['enable_view'=>1])->andWhere(['enable'=>1])->andWhere(['id'=>$id])->all();
        return $this->render('project',[
            'project'=>$project,
        ]);
    }
//    public function actionCat(){
//        
//        return $this->render('');
//    }



//    public function actionInit()
//    {
//        $auth=yii::$app->authManager;
//
//        $admin=$auth->createRole('admin');
//        $auth->add($admin);
//
//        $user=$auth->createRole('user');
//        $auth->add($user);
//
//        $repairman=$auth->createRole('repairman');
//        $auth->add($repairman);
//
//        $writer=$auth->createRole('writer');
//        $auth->add($writer);
//
//        $deliveryman=$auth->createRole('deliveryman');
//        $auth->add($deliveryman);
//
//    }

}





