<?php
$url =Yii::$app->urlManager;
?>
<div class="" >

    <?php
    if ($learn!=null){

    foreach ($learn as $l){
    $galery=\backend\models\Images::findOne($l->id_img);
    ?>
    <div class="learn-img">
        <img src="<?= Yii::$app->request->hostInfo ?>/upload/<?= $galery->name?>">
    </div>
    <h1 class="page-header pad"><span> <?= $l->title?></span></h1>

    <div class="row list-group ">
        <div class="col-md-10 col-sm-10 col-xs-12 col-md-offset-1 col-sm-offset-1">
            <h3 class="product_title" itemprop="name">نام مقاله : <?= $l->title?></h3>
            <div itemprop="">
                <h3 dir="rtl">
                    <?php $pro=\backend\models\Profile::find()->where(['id_user'=>$l->id_user])->one(); ?>
                    <p>نوشته شده توسط : <?= $pro->name;?></p>
                    <p><?= $l->dascription;?></p>
                    <p><?= $l->text; ?></p>

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
