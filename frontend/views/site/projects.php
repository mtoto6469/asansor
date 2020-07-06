<?php
$url = Yii::$app->urlManager;
?>
<div class=" sidebar-module " id="main">
    <div class="main">
        <div class="main1">
            <h1 class="page-header pad"><span>پروژه ها</span></h1>
        </div>
        <div class=" ">
            <?php
            if ($proj != null) {
                foreach ($proj as $p) {
                    $img = \backend\models\Images::findOne($p->id_img);
                    ?>
                    <div class=" pro-li col-lg-4 col-md-4 col-sm-6 col-xs-12 col-div proj">
                        <img
                            class="pro-img1"
                            src="<?= Yii::$app->request->hostInfo ?>/upload/<?= $img->name ?>" alt="<?= $img->alert ?>">

                        <h3 class="proj-h2"><?= $p->title; ?><br></h3>
                        <br>
                        <a href="<?= $url->createAbsoluteUrl(['site/project', 'id' => $p->id]) ?>"><span class="circle">جزییات</span></a>

                    </div>

                    <?php

                }
            }
            ?>
        </div>
    </div>
</div>
</div>