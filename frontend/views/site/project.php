
<?php
$url = Yii::$app->urlManager;
?>

<div class="mainproj">
    <div class="service-img">
        <span class="dark_bg"></span>
    </div>
    <div class="page_conten">
        <?php if ($project != null) {
            foreach ($project as $p) {
                ?>
                <div class="c"><h1 class="h1-margin"><?= $p->title?></h1>
                    <table class="table font_xs ">
                        <thead>
                        <tr>
                            <th scope="col">نام محل</th>
                            <th scope="col">تاریخ شروع</th>
                            <th scope="col">تاریخ پایان</th>
                            <th scope="col">نام کارفرما</th>
                            <th scope="col">وضعیت پروژه</th>


                        </tr>
                        </thead>
                        <tbody>
                        <?php


                        ?>
                        <tr>
                            <th scope="col"><?= $p->place ?></th>
                            <th scope="col"><?= $p->startdate ?></th>
                            <th scope="col"><?= $p->enddate ?> </th>
                            <th scope="col"><?= $p->karfarmaname ?></th>
                            <th scope="col">
                                <?php if ($p->statuse == 1) {
                                    echo "در دست اجرا";
                                } else if ($p->statuse == 2) {
                                    echo "پایان یافته";
                                } else {
                                    echo " ";
                                } ?>
                            </th>

                        </tr>
                        <?php
                        ?>

                        </tbody>
                    </table>
                    <?php
                    $img = \backend\models\Images::findOne($p->id_img);
                    ?>
                    <div class=" pro-li col-lg-4 col-md-4 col-sm-6 col-xs-12 col-div proj">
                        <img
                            class="pro-img1"
                            src="<?= Yii::$app->request->hostInfo ?>/upload/<?= $img->name ?>" alt="<?= $img->alert ?>">

                        <h3 class="proj-h2"><?= $p->title; ?><br></h3>
                        <br>
<!--                        <a href="--><?//= $url->createAbsoluteUrl(['site/project', 'id' => $p->id]) ?><!--"><span class="circle">جزییات</span></a>-->

                    </div>
                </div>
                <?php
            }
        }
        ?>
    </div>
</div>


