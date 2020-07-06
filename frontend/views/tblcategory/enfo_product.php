<?php
$url =Yii::$app->urlManager;
?>
<div class="main">
    <?php

    if ($product!=null){

    foreach ($product as $pro){
    $galery=\backend\models\Images::findOne($pro->id_img);
    ?>
    <h1 class="page-header pad"><span> <?= $pro->title?></span></h1>
    <div class="page-description"><p>[productname]</p></div>
    <div class="row1 list-group ">
        <div class="img col-md-5 col-sm-5 col-xs-12">
            <img style="width:90%;height: 420px" src="<?= Yii::$app->request->hostInfo ?>/upload/<?= $galery->name?>">
        </div>
        <div class="col-md-7 col-sm-7 col-xs-12">
            <h1 class="product_title" itemprop="name">نام محصول : <?= $pro->title?></h1>
            <br>
            <span>برند امریکا</span>
            <br>
            <span>قیمت : <?= $pro->price?>تومان</span>
            <br>
            <div class="add ">
                <a class="btn btn-danger  my-cart-b cartbag" href="<?= $url->createAbsoluteUrl(['bag/cart','id'=>$pro->id])?> " >اضافه به سبد خرید</a>
            </div>
            <br>
            <div itemprop="">
                <h3 dir="rtl">
                    <span>توضیحات</span>
                    <p><?= $pro->description?></p>
                </h3>
            </div>
            <br>


        </div>

    </div>
</div>
<?php
}
}
?>

<script type="text/javascript">
    function myfunction() {
        var name=$('#name').text();
        var date=$('#date').text();
        $.ajax({
            type:'Get',
            url:'<?php echo \Yii::$app->getUrlManager()->createUrl('bag')?>',
            data:{name:name,date:date},
            success:function (data) {
                $('#exist').html(data);
            }
        });
    }

</script>