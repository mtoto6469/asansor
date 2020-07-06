<?php
$url = Yii::$app->urlManager;
?>
<div class="">

    <?php
    if ($post != null){

    foreach ($post as $p){
    $galery = \backend\models\Images::findOne($p->id_img);
    ?>
    <div class="post-img">
        <img src="<?= Yii::$app->request->hostInfo ?>/upload/<?= $galery->name ?>">
    </div>
    <h1 class="page-header pad"><span> <?= $p->title ?></span></h1>

    <div class="row list-group ">
        <div class="col-md-10 col-sm-10 col-xs-12 col-md-offset-1 col-sm-offset-1">
            <h3 class="product_title" itemprop="name">نام مقاله : <?= $p->title ?></h3>
            <div itemprop="">
                <h3 dir="rtl">
                    <?php $pro = \backend\models\Profile::find()->where(['id_user' => $p->id_user])->one(); ?>
                    <p>نوشته شده توسط : <?= $pro->name; ?></p>
                    <p><?= $p->dascription; ?></p>
                    <p><?= $p->text; ?></p>

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
