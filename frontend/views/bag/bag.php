<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Bag */
/* @var $form yii\widgets\ActiveForm */
$url=Yii::$app->urlManager;
$sesstion = yii::$app->session;
if(!$sesstion->isActive){
    $sesstion->open();
}
$form=ActiveForm::begin();
?>
<div class="page-header center">
    <div class="aler alert-info">
       <p>توجه : هزینه ارسال در زمان تحویل حساب میشود و الان</p> <p class="font_m"> هزینه ارسال محصوب نشده </p>
    </div>
<table class="table font_xs ">

    <thead>

    <tr>
        <th scope="col">عکس محصول</th>
        <th scope="col">نام محصول</th>
        <th scope="col">تعداد محصول</th>
        <th scope="col">قیمت محصول</th>
        <th scope="col">قیمت کل</th>

    </tr>
    </thead>
    <tbody>

        <?php
        if($bag!=null){
            foreach ($bag as $b){
                $product=\backend\models\Tblproduct::findOne($b->id_pro);
                $id_img=explode(',',$product->id_img);
                $img=\backend\models\Images::findOne($id_img[0]);
                ?>
                

                <tr>

<!--                    --><?php //if(isset ($product) && $product!= null){?>
                    <th scope="col"><img src="<?=Yii::$app->request->hostInfo?>/upload/<?= $img->name?>" class="bagimg"></th>
                    <th scope="col"><?=$product->title?></th>

                    <th>
                    <select  class="select">
                    <?php for ($count=1; $count<=10; $count++){
                      echo '<option value="' . $count .'"' ;
                        if ($b->count==$count){
                            echo 'selected';
                        }
                        echo '>'.$count.'</option>';

                    }?>
                        </select>
                        </th>
                    <th scope="col"><?=$product->price?>تومان</th>
                    <th scope="col"><?=$b->price;?>    تومان

                    </th>
                    <th>
                        <?php if (!Yii::$app->user->isGuest){
                            $shop=\frontend\models\Bag::find()->where(['down_buy'=>0])->andWhere(['id_user'=>Yii::$app->user->getId()])->count();
                            if ($shop!=null){
                                $shop;
                            }
                        }?>
                    </th>

<!--                    <th scope="col">--><?//=$b->cont?><!--</th>-->

                    <th scope="col"><a href="<?= $url->createAbsoluteUrl(['bag/delete','id'=>$b->id])?>">حذف</a></th>



                </tr>

                <?php
            }
        }
        ?>
    </tbody>
</table>
<p>قیمت کل :</p>
 <?php
 if (isset($_SESSION['error_address'])){
     if ($_SESSION['error_address']!=null){?>
         <div class="alert alert-danger"><?=$_SESSION['aerror_address']?></div>
     <?php
     }
 }
 $check=\frontend\models\Factor::find()->where(['id_user'=>Yii::$app->user->getId()])->andWhere(['print'=>0])->all();
 ?>
   <select name="address">آدرس
       <option value="">آدرس</option>
       <?php foreach ($check as $c){?>
           <option value="<?= $c->id?>"><?=$c->address?></option>
       <?php
           
       }?>
   </select>
    <p>می توانید یکی از آدرس های بالا را که د رفاکتور های شما وجود دارد را انتخاب کنید </p>
    <div class="col-md-6"> <form>نام گیرنده  <input></form></div>
    <div class="col-md-6"> <form>تلفن گیرنده  <input></form></div>
    <div class="col-md-12"> <form>آدرس کامل گیرنده :  <input lang="3"></form></div>
<a href="<?= $url->createAbsoluteUrl(['']) ?>" class="btn btn-blue" >  پرداخت آنلاین </a>
<a href="<?= $url->createAbsoluteUrl(['']) ?>" class="btn btn-blue" >  پرداخت نقدی</a>

</div>