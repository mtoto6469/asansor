<?php
$session = yii::$app->session;
if (!$session->isActive) {
    $session->open();
}
/**
 * Created by PhpStorm.
 * User: maryam
 * Date: 5/23/2018
 * Time: 10:12 AM
 */
/* @var $this yii\web\View */

$this->title = 'My Yii Application';
$url = yii::$app->urlManager;
?>

<div class=" sidebar-module "id="main">
    <div class="dropdown-menu-right position ">
        <div id="dmahsool">
            <li style="line-height: 50px">
                <i class=""></i>دسته محصولات
            </li>
        </div>
        <div class="">

            <ul id="menu-content" class="hh">

                <?php
                if ($cat != null) {
                    echo '<ul>';
                    echo '<li><a class="redcol" href="' . $url->createAbsoluteUrl(['tblcategory/cat', 'id' => $cat->id]) . '">' . $cat->name . '</a>';
                    echo '<ul>';
                    $object = new subcat();
                    $object->fid_sub_cat($cat->id);
                    echo '</ul></li>';
                    echo '<ul>';
                } else {
                }
                //         ?>
            </ul>
        </div>
    </div>
    <div class="main-contain top">
        <div class="main1">
            <h1 class="page-header pad"><span>محصولات</span></h1>
            <div class="page-description"><p>[prodoctspage]</p></div>
            <div class="row1 list-group ">
                <ul class="list-ul clearfix">


                    <?php
                    $pro = \backend\models\Tblproduct::find()->where(['id_category' => $cat->id])->andWhere(['enable' => 1])->andWhere(['enable_view' => 1])->all();
                    if ($pro != null) {
                        foreach ($pro as $p) {
                            $img = \backend\models\Images::findOne($p->id_img);
                            ?>
                            <li class=" pro-li col-xs-12 col-sm-6 col-md-4 col-div "><a href="<?=$url->createAbsoluteUrl(['tblcategory/enfo_product','id'=>$p->id])?>"><img class="pro-img" src="<?= Yii::$app->request->hostInfo ?>/upload/<?= $img->name ?>" alt=""><div class="middle1"><div class="text1">yyyy</div></div></a>
                                <h2><?= $p->title; ?><br>
                                    <mark class=""><?= $p->price ?>تومان</mark><br>
                                </h2>
                                <div class="add ">
                                    <a class="btn btn-danger  my-cart-b cartbag" href="<?= $url->createAbsoluteUrl(['tblcategory/enfo_product','id'=>$p->id])  ?> ">جزییات</a>
                                </div>
                            </li>

                            <?php

                        }
                    }
                    $object2= new subpro();
                    $object2->fid_sub_pro($cat->id);
                    ?>
                </ul>
            </div>
        </div>
    </div>

</div>


<?php

?>
<?php

class subcat
{
    function fid_sub_cat($id_parent)
    {
        $url = Yii::$app->urlManager;
        $query = \frontend\models\Tblcategory::find()->where(['enable' => 1])->andWhere(['enable_view' => 1])->andWhere(['id_parent' => $id_parent])->all();
        if ($query != null) {
            foreach ($query as $q) {
                echo '<li><a class="redcol" href="' . $url->createAbsoluteUrl(['tblcategory/cat', 'id' => $q->id]) . '">' . $q->name . '</a></li>';
                echo '<ul>';
                $this->fid_sub_cat($q->id);
                echo '</ul>';
            }
        }
    }
}


?>

<?php
class subpro{
function fid_sub_pro($id_parent){
$url = Yii::$app->urlManager;
$query = \frontend\models\Tblcategory::find()->where(['enable' => 1])->andWhere(['enable_view' => 1])->andWhere(['id_parent' => $id_parent])->all();
if ($query != null) {
    foreach ($query as $q) {
        $pro = \backend\models\Tblproduct::find()->where(['id_category' => $q->id])->andWhere(['enable' => 1])->andWhere(['enable_view' => 1])->all();
        if ($pro != null) {
            foreach ($pro as $p) {
                $img = \backend\models\Images::findOne($p->id_img);
                ?>
                <li class=" pro-li col-xs-12 col-sm-6 col-md-4 col-div"><a href="<?=$url->createAbsoluteUrl(['tblcategory/enfo_product','id'=>$p->id])?>"><img class="pro-img" src="<?= Yii::$app->request->hostInfo ?>/upload/<?= $img->name ?>" alt="<?= $img->alert ?>"><div class="middle1"><div class="text1">77777777</div></div></a>
                    <h2><?= $p->title; ?><br><mark class=""><?= $p->price ?>تومان</mark><br></h2>
                    <div class="fa fa-star fa-star-half-full">
                        <span style="width:0%;">
                            <strong class="duration"></strong>
                        </span>
                    </div>
                    <div class="add ">
                        <a class="btn btn-danger  my-cart-b cartbag" href="<?= $url->createAbsoluteUrl(['tblcategory/enfo_product','id'=>$p->id])?> ">جزییات</a>
                    </div>
                </li>


<?php

            }
            }

        $this->fid_sub_pro($q->id);
        }
    }
}





}



?>