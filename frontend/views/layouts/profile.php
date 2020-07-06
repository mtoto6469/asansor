
<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\models\Tblcategory;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
$url = Yii::$app->urlManager;
?>
<?php $this->beginPage() ?>
<!DOCTYPE HTML>
<html style="direction: rtl;">
<head>
    <title>Studio</title>
    <meta charset="utf-8">

    <?php $this->head() ?>
</head>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid ">
        <div class="navbar-header">



            <?php

            if (!Yii::$app->user->isGuest){

                $user=\common\models\User::findOne(Yii::$app->user->getId());?>
                <a class="navbar-brand page-scroll font_xs" href="<?= $url->createAbsoluteUrl(['site/logout'],['data-method' => 'post']) ?> "  >خروج</a>
                <a class="navbar-brand page-scroll" ><?= $user->username?></a>
                <a class="navbar-brand page-scroll" href="<?= $url->createAbsoluteUrl(['site/profile'])?> " >پروفایل</a>

                <?php
            }else{?>

                <a class="navbar-brand page-scroll" href="<?= $url->createAbsoluteUrl(['site/signup']) ?>" >ثبت نام </a>
                <a class="navbar-brand page-scroll" href="<?= $url->createAbsoluteUrl(['site/login']) ?>"> ورود</a>

                <?php
            }
            ?>

        </div>
        <div class="">  <a class="page-scroll" data-toggle="modal" data-target="#cartModal""><img class="cart" src="../../../upload/icon/basket2.png"></a></div>
        <div class="collapse navbar-collapse  " id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right hid">
                <li><a class="page-scroll active" href="<?= $url->createAbsoluteUrl(['site/index']) ?>">صفحه
                        اصلی</a></li>
                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown"
                                        href="<?= $url->createAbsoluteUrl(['tblcategory/cat']) ?>">محصولات</a>
                    <ul class="dropdown-menu">
                        <?php

                        $category = Tblcategory::find()->filterWhere(['enable_view' => 1])->andWhere(['enable' => 1])->all();
                        if ($category != null) {
                            foreach ($category as $cat) {
                                if ($cat->id_parent == 0) {
                                    ?>
                                    <li class="dropdown"><a class="dropdown-toggle"
                                                            href="<?= $url->createAbsoluteUrl(['tblcategory/cat', 'id_parent' => $cat->id_parent, 'id' => $cat->id]) ?>"><?= $cat->name; ?></a>
                                    <?php
                                    $object = new cat();
                                    $object->addcategory($cat->id);
                                    ?>
                                    <?php
                                }
                                ?>
                                <?php
                            }
                            ?>
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                <li><a class="page-scroll" data-toggle="modal" data-target="#myModal">استعلام قیمت انواع اسانسور</a>
                </li>

                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown">خدمات</a>
                    <ul class="dropdown-menu">
                        <li><a href="<?= $url->createAbsoluteUrl(['site/service_maintenance']) ?>">سرویس و
                                نگهداری</a></li>
                        <li><a href="<?= $url->createAbsoluteUrl(['site/login']) ?>">نوسازی و بازسازی</a></li>
                    </ul>
                </li>

                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown">پروژه ها</a>
                    <ul class="dropdown-menu">
                        <li><a class="page-scroll" href="<?= $url->createAbsoluteUrl(['site/projects','statuse'=>1]) ?>">پروژه های در دست اجرا</a></li>
                        <li><a class="page-scroll" href="<?= $url->createAbsoluteUrl(['site/projects','statuse'=>2]) ?>">پروژه های پایان یافته</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" >مقالات </a>
                    <ul class="dropdown-menu">
                        <?php $postcategory=\backend\models\Tblpostcategory::find()->filterWhere(['enable_view'=>1])->andWhere(['enable'=>1])->all();
                        if ($postcategory != null){
                            foreach ($postcategory as $pc){
                                if ($pc->id_parent==0){?>
                                    <li class=""><a href="<?= $url->createAbsoluteUrl(['site/post','id'=>$pc->id])?>"><?= $pc->title;?></a>
                                        <?php
                                        $object=new pcat();
                                        $object->addpostcategory($pc->id);
                                        ?>
                                    </li>
                                    <?php
                                }
                            }
                        }
                        ?>
                    </ul>
                </li>
                <li><a class="page-scroll" href="<?= $url->createAbsoluteUrl(['site/']) ?>">آموزش</a></li>
                <li><a class="page-scroll" href="<?= $url->createAbsoluteUrl(['massege/create']) ?>">درخواست فوری تعمیرکار</a></li>
                <li><a class="page-scroll" href="<?= $url->createAbsoluteUrl(['massege/create']) ?>">تماس با ما</a></li>
                <li><a class="page-scroll" href="<?= $url->createAbsoluteUrl(['site/about']) ?>">درباره ما</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right hid1" id="hid12">
                <li><a class="page-scroll active" href="<?= $url->createAbsoluteUrl(['site/index']) ?>">صفحه
                        اصلی</a></li>
                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown"  href="<?= $url->createAbsoluteUrl(['tblcategory/cat']) ?>">محصولات</a>
                    <ul class="dropdown-menu">
                        <?php

                        $category = Tblcategory::find()->filterWhere(['enable_view' => 1])->andWhere(['enable' => 1])->all();
                        if ($category != null) {
                            foreach ($category as $cat) {
                                if ($cat->id_parent == 0) {
                                    ?>
                                    <li class="dropdown"><a class="dropdown-toggle"
                                                            href="<?= $url->createAbsoluteUrl(['tblcategory/cat', 'id_parent' => $cat->id_parent, 'id' => $cat->id]) ?>"><?= $cat->name; ?></a>
                                        <?php
                                        $object = new cat();
                                        $object->addcategory($cat->id);
                                        ?>
                                    </li>
                                    <?php
                                }
                            }
                        }
                        ?>
                    </ul>
                <li><a class="page-scroll" data-toggle="modal" data-target="#myModal">استعلام قیمت انواع اسانسور</a></li>
                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown">پروژه ها</a>
                    <ul class="dropdown-menu">
                        <li><a class="page-scroll" href="<?= $url->createAbsoluteUrl(['site/projects']) ?>">پروژه های در دست اجرا </a></li>
                        <li><a class="page-scroll" href="<?= $url->createAbsoluteUrl(['site/project']) ?>">پروژه های پایان یافته</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" >مقالات</a>
                    <ul class="dropdown-menu">
                        <?php $postcategory=\backend\models\Tblpostcategory::find()->where(['enable_view'=>1])->andWhere(['enable'=>1])->all();
                        if($postcategory !=null){
                            foreach ($postcategory as $pc){
                                if ($pc->id_parent==0){?>
                                    <li class="dropdown"><a class="dropdown-toggle" href="<?= $url->createAbsoluteUrl(['site/post','id_parent'=>$pc->id_parent,'id'=>$pc->id])?>"><?= $pc->title;?></a>
                                    <?php
                                    $object=new pcat();
                                    $object->addpostcategory($pc->id);
                                }
                            }
                            ?>
                            </li>
                            <?php
                        }
                        ?>
                    </ul>
                </li>
                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown"
                                        href=" ">خدمات</a>
                    <ul class="dropdown-menu">
                        <li><a
                                href="">سرویس
                                و نگه داری</a>
                            <ul class="dropdown-menu ">
                                <li><a class="page-scroll"
                                       href="<?= $url->createAbsoluteUrl(['site/index']) ?>">تعمیرات</a></li>
                            </ul>
                        </li>
                        <li><a href="<?= $url->createAbsoluteUrl('site/login') ?>">نوسازی</a>
                        </li>
                        <li><a href="<?= $url->createAbsoluteUrl(['site/login']) ?>">بهینه
                                سازی</a></li>
                    </ul>
                </li>
                <li><a class="page-scroll" href="<?= $url->createAbsoluteUrl(['site/']) ?>">آموزش</a></li>
                <li><a class="page-scroll" href="<?= $url->createAbsoluteUrl(['massege/create']) ?>">درخواست فوری تعمیرکار</a></li>
                <li><a class="page-scroll" href="<?= $url->createAbsoluteUrl(['massege/create']) ?>">تماس با ما</a></li>
                <li><a class="page-scroll" href="<?= $url->createAbsoluteUrl(['site/about']) ?>">درباره ما</a></li>

            </ul>
        </div>
    </div><!-- /.container-fluid -->
</nav>
<div id="page-top" class="index">


    <?php $this->beginBody() ?>
    <body>

    <?= $content; ?>


    <div class="col-lg-2" id="profile">
        <div class="hidden-xs">
            <div class="">
                <?php $user = \common\models\User::findOne(Yii::$app->user->getId()); ?>
                <h4>کاربر :<?= $user->username;?> </h4>
            </div>
        </div>
        <ul class="nav">
            <li><a href="<?= $url->createAbsoluteUrl(['massege/create'])?>">درخواست فوری تعمیرکار</a></li>


                <li><a href="<?= $url->createAbsoluteUrl(['profile/index'])?>">محصولات</a></li>



            <li><a href="<?= $url->createAbsoluteUrl(['site/service_maintenance'])?>">سرویس و نگهداری</a></li>
            <li><a href="<?= $url->createAbsoluteUrl(['massege/create'])?>">درخواست بازسازی و نوسازی</a></li>
            <li><a href="<?= $url->createAbsoluteUrl(['factor/index','confirm'=>0])?>">سفارشات</a></li>
            <li><a href="<?= $url->createAbsoluteUrl(['massege/view'])?>">درخواست های ارسال شده</a></li>
            <li><a href="<?= $url->createAbsoluteUrl(['profile/update','id'=>$user->id])?>">ویرایش اطلاعات</a></li>
        </ul>
    </div>

    <footer class="footer1">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <h3>دسته ها</h3>
                    <hr>
                    <?php $foot_category = \frontend\models\Tblcategory::find()->where(['enable_view' => 1])->andWhere(['enable' => 1])->andWhere(['footer' => 1])->all();
                    if ($foot_category != null) {
                        foreach ($foot_category as $footcat) {
                            ?>

                            <ul>
                                <li><a href="<?= $url->createAbsoluteUrl(['tblcategory/cat', 'id_parent' => $footcat->id_parent, 'id' => $footcat->id]) ?>"><?= $footcat->name ?></a></li>

                            </ul>
                            <?php
                        }


                    }
                    ?>
                </div>
                <div class="col-lg-4 col-md-4">
                    <h3>ما را در شبکه های اجتماعی دنبال کنید</h3>
                    <hr>
                    <ul>
                        <li><a><i class="google_plas"></i></a></li>
                        <li><a><i class="telegram"></i></a></li>
                        <li><a><i class="instagram"></i></a></li>

                    </ul>
                </div>
                <div class="col-lg-4 col-md-4">
                    <h3> پشتیبانی</h3>
                    <hr>
                    <p>0912-222 22 22</p>
                </div>
            </div>
        </div>
        <br>

    </footer>
    <div class=" footer2">
        <div class="row">

            <div class="col-md-12 ">
                <h3 class="font_sx">طراحی شده توسط تیم برنامه نویسان شرکت <a class="font_sx">طرح ریزان حامی</a></h3>
            </div>

        </div>
    </div>
    <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
<!-----------modal-------------->
<div id="myModal" class="modal fade " role="dialog">
    <div class="modal-dialog modal_zindex">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">

                <h4 class="modal-title font_l">استعلام قیمت آسانسور</h4>
            </div>
            <div class="modal-body">
                <div class="modal1">
                    <p class="font_m"> لطفا تعداد طبقات مورد نظر خود را انتخاب نمایید یا برای مشاوره بیشتر گزینه

                        سایر انتخاب نمایید</p>
                    <ul>
                        <?php $floor=\backend\models\Priceforelevator::find()->where(['enable'=>1])->andWhere(['enable_view'=>1])->all();
                        if ($floor != null){
                            foreach ($floor as $f){?>
                                <li><a href="<?= $url->createAbsoluteUrl(['site/inquiry_price','floorNamber'=>$f->floorNamber]) ?>"><?= $f->floorNamber?> طبقه</a></li>
                                <?php
                            }
                        }
                        ?>
                        <li><a href="<?= $url->createAbsoluteUrl(['site/hydraulic_lift']) ?>">هیدرولیک</a></li>
                        <li><a href="<?= $url->createAbsoluteUrl(['site/login']) ?>">8 توقف به بالا</a></li>
                    </ul>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

<?php

class cat
{

    function addcategory($id_parent)
    {
        $url = Yii::$app->urlManager;

        $cat = Tblcategory::find()->where(['id_parent' => $id_parent])->all();
//        var_dump($cat);exit();
        ?>
        <ul class="tt-dropdown-menu sub_manu">
            <?php foreach ($cat as $c) {
//                if ($c->id_parent!=0)
                ?>
                <li class="dropdown pad5 "><a class="dropdown-toggle"
                                              href="<?= $url->createAbsoluteUrl(['tblcategory/cat', 'id_parent' => $c->id_parent, 'id' => $c->id]) ?>"><?= $c->name; ?></a>
                    <?php $this->addcategory($c->id); ?>
                </li>
                <?php
            } ?>
        </ul>
        <?php
    }
}


class pcat
{
    function addpostcategory($id_parent){
        $url=Yii::$app->urlManager;
        $pcat=\backend\models\Tblpostcategory::find()->where(['id_parent'=>$id_parent])->all();  ?>
        <ul class="tt-dropdown-menu sub_manu">
            <?php  foreach ($pcat as $pc){?>
                <li class="dropdown pad5"><a class="dropdown-toggle" href="<?= $url->createAbsoluteUrl(['site/post','id_parent'=>$pc->id_parent,'id'=>$pc->id])?>"><?= $pc->title; ?></a>
                    <?php $this->addpostcategory($pc->id);?>
                </li>
                <?php
            }?>
        </ul>
        <?php
    }
}









