<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Factor */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Factors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="container content col-sm-10">

    <?php $user=\common\models\User::find()->where(['id'=>$model->id_user])->one();?>

    <div class="row" style="padding: 2%;">
        <!-- Pricing -->

        <div class="pricing hover-effect">
            <div class="pricing-head">
                <h3>نام کاربر  :
                    <?=$user->username?>
                    <span>تاریخ سفارش<?=$model->date_ir?></span>
                </h3>
                <h4>
                    <i>
                        قیمت فاکتور:<?=$model->price?>تومان</i>

                </h4>
                <?php


                ?>

            </div>

            // <?php

            foreach ($bag as $al1){
                $bag=\frontend\models\Bag::find()->where(['id_fac'=>$model->id])->all();



                ?>

                <div class="row">



                    <h4 style="padding-right: 5%">محصول </h4>
                    <div class="row">
                        <div class="col-md-12">
                            <ul class="pricing-content list-unstyled right-ul">
                                <li>
                                    نام
                                </li>
                                <li>
                                    برند
                                </li>
                                <li>
                                    تعداد
                                </li>

                                <li>
                                    قیمت محصول
                                </li>

                                <li>
                                    عکس محصول
                                </li>


                            </ul>
                        </div>
                        <?php

                        foreach ($bag as $b){

                        $product=\backend\models\Tblproduct::find()->where(['id'=>$b->id_pro])->one();
                        $cat=\backend\models\Tblcategory::find()->where(['id'=>$product->id_category])->one();
                        ?>
                        <div class="col-md-12">
                            <ul class="pricing-content list-unstyled right-ul">
                                <li>
                                    <?=$product->title?>
                                </li>
                                <li>
                                    <?php

                                    if($product->brand!=null){
                                        if($product->brand==null){
                                            echo '--';

                                        }else{
                                            echo $product->brand;
                                        }

                                    }else{
                                        echo '--';
                                    }


                                    ?>

                                </li>

                                <li>
                                    <?=$b->count?>
                                </li>

                                <li>
                                    <?=$b->price?>
                                </li>

                                <li>


                                    <img style="width:50px " src="<?=Yii::$app->request->hostInfo?>/upload/<?=$product->id_img?>">;

                                </li>
                            </ul>
                        </div>

                    </div>
                    <br>
                    <br>

                    <?php

                    }

                    ?>
                    <div class="text-center">
                        <p>آدرس ارسال: <?=$al1->address?></p>
                        <p>هزینه ارسال: <?=$al1->price_post?></p>
                        <p>هزینه نهایی: <?=$al1->price?></p>
                        <hr>
                    </div>

                </div>

            <?php }?>


            <div class="pricing-footer">

                <?php
                if($model->confirm==0){
                    echo Html::a(Yii::t('app', 'تایید'), ['update','id'=>$model->id,'resive'=>0,'visibel'=>0 ,'print'=>0], ['class' => 'btn btn-success'])  ;
                    echo Html::a(Yii::t('app', 'عدم تایید'), ['update','id'=>$model->id,'resive'=>0,'visibel'=>0 ,'print'=>0], ['class' => 'btn btn-danger'])  ;

                }else{
                    if($model->visibel==0 && $model->resive==0){

                        echo Html::a(Yii::t('app', 'بررسی شد'), ['update','id'=>$model->id,'resive'=>0,'visibel'=>0 ,'print'=>0], ['class' => 'btn btn-success'])  ;
                    }elseif($model->visibel==1 && $model->resive==0 && $model->print==1){
                        echo Html::a(Yii::t('app', 'تحویل داده شد'), ['update','id'=>$model->id, 'resive'=>0,'visibel'=>1 ,'print'=>1], ['class' => 'btn btn-success']) ;

                    }elseif($model->visibel==1 && $model->resive==1){
                        echo Html::a(Yii::t('app', 'حدف شود'), ['delete', 'id' => $model->id], ['class' => 'btn btn-success']) ;
                        echo Html::a(Yii::t('app', 'بازبینی'), ['back_resive', 'id' => $model->id], ['class' => 'btn btn-success']) ;

                    }elseif($model->visibel==1 && $model->resive==0 && $model->print==0){
                        echo Html::a(Yii::t('app', 'بسته بندی شد'), ['update','id'=>$model->id, 'resive'=>0,'visibel'=>1 ,'print'=>0], ['class' => 'btn btn-success']) ;

                    }

                }

                ?>

                </p>
            </div>
        </div>

    </div> <!--//end row -->





</div>
