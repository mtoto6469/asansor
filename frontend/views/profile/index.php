<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ServiceBuySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$url=Yii::$app->urlManager;
?>
<div class="profile-index col-sm-9">

    
<?php   $product=\backend\models\Tblproduct::find()->all();
    if ($product != null) {
        foreach ($product as $p) {
            $img =\backend\models\Images::findOne($p->id_img);
            ?>
            <li class=" pro-li col-xs-12 col-sm-6 col-md-4 col-div "><a href="<?=$url->createAbsoluteUrl(['tblcategory/enfo_product','id'=>$p->id])?>"><img class="pro-img" src="<?= Yii::$app->request->hostInfo ?>/upload/<?= $img->name ?>" alt=""><div class="middle1"><div class="text1">yyyy</div></div></a>
                <h2><?= $p->title; ?><br>
                    <mark class=""><?= $p->price ?>تومان</mark><br>
                </h2>
                <div class="add ">
                    <a class="btn btn-danger  my-cart-b cartbag" href="<?= $url->createAbsoluteUrl(['bag/bag','id'=>$p->id])  ?> ">اضافه به سبد خرید</a>
                </div>
            </li>

            <?php

        }
    }
    ?>

</div>

