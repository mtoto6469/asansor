
<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<?php $url= yii::$app->urlManager;?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<html lang="IR-fa" dir="rtl">
<head>
<!-- BEGIN HEAD -->
    <meta charset="UTF-8" />
    <title>BCORE Admin Dashboard Template | Dashboard </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!--[if IE]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <![endif]-->
    <!-- GLOBAL STYLES -->
    

    

    <?php $this->head() ?>
</head>

<?php $this->beginBody() ?>

<body>
<div class="container-fluid">

    <?= $content?>

    <div class="nav-side-menu col-lg-2">
        <div class="brand">Brand Logo</div>
        <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>

        <div class="menu-list ">

            <ul id="menu-content" class="menu-content collapse out">
                <li>
                    <a href="#">
                        <i class="fa fa-dashboard fa-lg"></i> پنل مدیریت
                    </a>
                </li>

                <li data-toggle="collapse" data-target="#address" class="collapsed">
                    <a href="#"><i class="fa fa-car fa-lg"></i> آدرس و تلفن  <span class="arrow"></span></a>
                    <ul class="sub-menu collapse" id="address">
                        <li><a href="<?= $url->createAbsoluteUrl('tbladdress/create')?>"">ثبت آدرس جدید</a></li>
                        <li><a href="<?=$url->createAbsoluteUrl('tbladdress/index')?>">مدیریت محتوا</a></li>
                    </ul>
                </li>

                <li data-toggle="collapse" data-target="#daste" class="collapsed">
                    <a href="#"><i class="fa fa-globe fa-2x" ></i> ثبت دسته ها <span class="arrow"></span></a>
                    <ul class="sub-menu collapse" id="daste">
                        <li><a href="<?=$url->createAbsoluteUrl('tblcategory/create')?>">ثبت دسته جدید</a></li>
                        <li><a href="<?=$url->createAbsoluteUrl('tblcategory/index')?>">مدیریت دسته ها</a></li>
                    </ul>
                </li>

                <li data-toggle="collapse" data-target="#product" class="collapsed">
                    <a href="#"><i class="fa fa-globe fa-lg"></i> ثبت محصول <span class="arrow"></span></a>
                    <ul class="sub-menu collapse" id="product">
                        <li><a href="<?=$url->createAbsoluteUrl('tblproduct/create')?>">ثبت محصول جدید</a></li>
                        <li><a href="<?=$url->createAbsoluteUrl('tblproduct/index')?>">مدیریت محصولات</a></li>
                    </ul>
                </li>

                <li data-toggle="collapse" data-target="#service" class="collapsed">
                    <a href="#"><i class="fa fa-globe fa-lg"></i> ثبت سرویس ها <span class="arrow"></span></a>
                    <ul class="sub-menu collapse" id="service">
                        <li><a href="<?=$url->createAbsoluteUrl('service/create')?>">ثبت سرویس جدید</a></li>
                        <li><a href="<?=$url->createAbsoluteUrl('service/index')?>">مدیریت سرویس</a></li>
                    </ul>
                </li>

                <li data-toggle="collapse" data-target="#postcategory" class="collapsed">
                    <a href="#"><i class="fa fa-globe fa-2x" ></i> ثبت دسته مقالات <span class="arrow"></span></a>
                    <ul class="sub-menu collapse" id="postcategory">
                        <li><a href="<?=$url->createAbsoluteUrl('tblpostcategory/create')?>">ثبت دسته مقالات جدید</a></li>
                        <li><a href="<?=$url->createAbsoluteUrl('tblpostcategory/index')?>">مدیریت دسته ها</a></li>
                    </ul>
                </li>

                <li data-toggle="collapse" data-target="#new" class="collapsed">
                    <a href="#"><i class="fa fa-car fa-lg"></i> پست  <span class="arrow"></span></a>
                    <ul class="sub-menu collapse" id="new">
                        <li><a href="<?=$url->createAbsoluteUrl('post/create') ?>">ذخیره پست جدید</a></li>
                        <li><a href="<?=$url->createAbsoluteUrl('post/index')?>">مدیریت پست ها</a></li>
                    </ul>
                </li>

                <li data-toggle="collapse" data-target="#learn" class="collapsed">
                    <a href="#"><i class="fa fa-car fa-lg"></i> آموزش  <span class="arrow"></span></a>
                    <ul class="sub-menu collapse" id="learn">
                        <li><a href="<?=$url->createAbsoluteUrl('learn/create') ?>">ذخیره آموزش جدید</a></li>
                        <li><a href="<?=$url->createAbsoluteUrl('learn/index')?>">مدیریت آموزش ها</a></li>
                    </ul>
                </li>

                <li data-toggle="collapse" data-target="#project" class="collapsed">
                    <a href="#"><i class="fa fa-car fa-lg"></i> پروژه های آسانسور  <span class="arrow"></span></a>
                    <ul class="sub-menu collapse" id="project">
                        <li><a href="<?=$url->createAbsoluteUrl('project/create') ?>">ثبت پروژه جدید</a></li>
                        <li><a href="<?=$url->createAbsoluteUrl('project/index')?>">مدیریت پروژه ها</a></li>
                    </ul>
                </li>

                <li data-toggle="collapse" data-target="#galery" class="collapsed">
                    <a href="#"><i class="fa fa-car fa-lg"></i> گالری  <span class="arrow"></span></a>
                    <ul class="sub-menu collapse" id="galery">
                        <li><a href="<?=$url->createAbsoluteUrl('images/create') ?>">ذخیره عکس جدید</a></li>
                        <li><a href="<?=$url->createAbsoluteUrl('images/index')?>">مدیریت گالری</a></li>
                    </ul>
                </li>

                <li data-toggle="collapse" data-target="#price" class="collapsed">
                    <a href="#"><i class="fa fa-car fa-lg"></i> استعلام قیمت  <span class="arrow"></span></a>
                    <ul class="sub-menu collapse" id="price">
                        <li><a href="<?=$url->createAbsoluteUrl('priceforelevator/create') ?>">ثبت استعلام جدید</a></li>
                        <li><a href="<?=$url->createAbsoluteUrl('priceforelevator/index')?>">مدیریت استعلام ها</a></li>
                    </ul>
                </li>

                <li data-toggle="collapse" data-target="#user" class="collapsed">
                    <a href="#"><i class="fa fa-car fa-lg"></i> ثبت کاربر  <span class="arrow"></span></a>
                    <ul class="sub-menu collapse" id="user">
                        <li><a href="<?=$url->createAbsoluteUrl('profile/create') ?>">ثبت کاربر جدید</a></li>
                        <li><a href="<?=$url->createAbsoluteUrl('profile/index')?>">مدیریت کاربران</a></li>
                    </ul>
                </li>

                <li data-toggle="collapse" data-target="#masseg" class="collapsed">
                    <?= $massege=\backend\models\Massege::find()->where(['enable_view'=>1])->andWhere(['confirm'=>0])->count(); ?>
                    <a href="#"><i class="fa fa-car fa-lg"></i> پیغام ها <span class="badge bg-red"><?=$massege?></span> <span class="arrow"></span></a>
                    <ul class="sub-menu collapse" id="masseg">
                        <li><a href="<?=$url->createAbsoluteUrl(['massege/index','confirm'=>1]) ?>">تمام پیام ها</a></li>
                        <li><a href="<?=$url->createAbsoluteUrl(['massege/indexx','confirm'=>1])?>">فقط هیدرولیک</a></li>
                    </ul>
                </li>

                <li class="collapsed"><a href="<?=$url->createAbsoluteUrl(['massege/index','confirm'=>1]) ?>"><i class="fa fa-car fa-lg">لیست درخواست های فوری<span class="arrow"></span></i></a></li>

                <li data-toggle="collapse" data-target="#service_factor" class="collapsed">
                    <?= $service=\backend\models\Servicebuy::find()->where(['enable_view'=>1])->andWhere(['confirm'=>0])->count(); ?>
                    <a href="#"><i class="fa fa-car fa-lg"></i> قرارداد سرویس ها <span class="badge bg-red"><?=$service?></span> <span class="arrow"></span></a>
                    <ul class="sub-menu collapse" id="service_factor">
                        <li><a href="<?=$url->createAbsoluteUrl(['servicebuy/index','confirm'=>1]) ?>">سرویسهای جدید</a></li>
                        <li><a href="<?=$url->createAbsoluteUrl(['servicebuy/indexx','confirm'=>1])?>">تمام سرویس ها</a></li>
                    </ul>
                </li>

                <li data-toggle="collapse" data-target="#factor" class="collapsed">
                    <?= $query=\backend\models\Factor::find()->where(['visibel'=>0])->andWhere(['resive'=>0])->andWhere(['confirm'=>1])->count(); ?>
                    <a href="#"><i class="fa fa-car fa-lg"></i>فاکتور ها   <span class="badge bg-red"><?=$query?></span><span class="arrow"></span></a>
                    <ul class="sub-menu collapse" id="factor">
                        <li><a href="<?=$url->createAbsoluteUrl(['factor/index','resive'=>0,'visibel'=>0,'print'=>0]) ?>">فاکتورهای جدید</a></li>
                        <li><a href="<?=$url->createAbsoluteUrl(['factor/index','resive'=>0,'visibel'=>1,'print'=>0])?>">بسته بندی فاکتور</a></li>
                        <li><a href="<?=$url->createAbsoluteUrl(['factor/index','resive'=>0,'visibel'=>1,'print'=>1])?>">فاکتورهای درحال ارسال</a></li>
                        <li><a href="<?=$url->createAbsoluteUrl(['factor/index','resive'=>0,'visibel'=>1,'print'=>1])?>">فاکتورهای ارسال شده</a></li>
                        <li><a href="<?=$url->createAbsoluteUrl(['pardakht/index','resive'=>0,'visibel'=>1,'confirm'=>1])?>">فاکتورهای در انتظار تایید</a></li>
                        <li><a href="<?=$url->createAbsoluteUrl(['pardakht/index','resive'=>0,'visibel'=>1,'confirm'=>1])?>">فاکتورهای تایید شده</a></li>
                    </ul>
                </li>
<!--                --><?php //$user=\backend\models\AuthAssignment::find()->where(['user_id'=>\Yii::$app->user->getId()])->one();
//                if ($user->item_name=='deliveryman'){
//                ?>

                <li class="collapsed"><a href="<?= $url->createAbsoluteUrl(['deliveryman/index','confirm'=>0])?>"><i class="fa fa-car fa-lg">فاکتورهای جدید<span class="arrow"></span></i></a></li>
                <li class="collapsed"><a href="<?= $url->createAbsoluteUrl(['deliveryman/index','confirm'=>1])?>"><i class="fa fa-car fa-lg">فاکتورهای ارسال شده<span class="arrow"></span></i></a></li>
                <li class="collapsed"><a href="<?= $url->createAbsoluteUrl(['site/logout','type'=>1])?>"><i class="fa fa-car fa-lg">خروج<span class="arrow"></span></i></a></li>
<!--                --><?php //} ?>
            </ul>
        </div>
    </div>


    <!-- /#page-content-wrapper -->

</div>
    <!-- FOOTER -->
    <div id="footer">
        <div id="footer"><p>طراحی شده توسط شرکت طرح ریزان حامی</p></div>
        <p>&copy;  binarytheme &nbsp;2014 &nbsp;</p>
    </div>
    <!--END FOOTER -->


</body>

</html>
    
    
<?php $this->endBody() ?>

<?php $this->endPage() ?>
