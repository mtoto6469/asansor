<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<header style="height: 300px;">
    <!--    <div class="container">-->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <?php
            if ($slider != null) { ?>
                <div class="item active">
                    <img src="<?= Yii::$app->request->hostInfo ?>/upload/as.jpg?>" alt="hh"
                         style="width:100%;height: 300px;">
                    <!--                    <div class="carousel-caption">-->
                    <!--                        <h3>Los Angeles</h3>-->
                    <!--                        <p>LA is always so much fun!</p>-->
                    <!--                    </div>-->
                </div>
                ?><?php
                foreach ($slider as $slid) {
//                        var_dump($slid->name);
                    ?>
                    <div class="item">
                        <img src="<?= Yii::$app->request->hostInfo ?>/upload/<?= $slid->name ?>"
                             alt="<?= $slid->alert ?>" class="slide-img">
                    </div>
                    <?php
                }
//                    exit();
            } ?>


            <!-- Left and right controls -->
            <a class="left carousel-control slide-pn" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control slide-pn" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <!--    </div>-->
</header>
<section class="section1">
    <?php $address = \backend\models\Tbladdress::find()->where(['enable_view' => 1])->andWhere(['status' => 1])->all();
    if ($address) {
        foreach ($address as $a) {
            ?>
            <p><?= $a->textindex ?></p>
            <?php
        }
    } else {
        ?>
        <p>

            آسانسور به صورت امروزی در حدود ۵۰ سال پیش وارد کشور شده است و اولین نمایندگی فروش آسانسور در کشور مربوط به
            یک شرکت سوئیسی می باشد که توسط یک شرکت ایرانی وارد شد و بعد از آن نیز شرکت های خارجی دیگر در این زمینه
            فعالیت داشتند اولین کارخانه در ایران توسط وزارت مسکن و شهر سازی در سال ۱۳۵۰ در شهر صنعتی البرز قزوین تحت
            لیسانس یک شرکت سوئیسی بنا گردید و بعد از آن نیز کارخانجات دیگری توسط شرکت های خارجی در ایران فعالیت نمودند
            ولی با توجه به تحریم وسایل بعد از انقلاب و بر اساس ضرورت و نیاز شروع به فعالیتهای تولیدی در زمینه ساخت قطعات
            یدکی آسانسور نمودند و در واقع آسانسور به صورت تلفیقی در کشور تولید و نصب گردید تا اینکه در دهه ۷۰ مجوز
            واردات آزاد شده وبه تبع آن واحدهای فروش آسانسور به صورت رسمی و غیر رسمی بوجود آمدند.</p>

        <?php
    }
    ?>

</section>

<!-- ===== Article ===== -->
<section id="port" class="demos mysection section1">
    <div class="ptext"><p>مقالات برگزیده</p></div>
    <div class="container-floid">
        <div class="row">
            <div class="col-lg-12 text-center">
                <hr class="indhr">
            </div>
        </div>
        <?php
        //        for ($i=1; $i=6;$i++) {?>
        <div id="grid" class="main">

            <?php if ($article != null) {

                foreach ($article as $art) {


                    $galery1 = \backend\models\Images::findOne($art->id_img);

                    ?>
                    <div class="view">
                        <img src="<?= Yii::$app->request->hostInfo ?>/upload/<?= $galery1->name; ?>" alt=""
                             class="imageindex">
                        <div class="overlayindex">
                            <div class="textindex"><?= $art->dascription; ?></div>
                        </div>
                        <?php

                        ?>
                    </div>
                    <?php
                }
            }
            ?>

        </div>
        <!--        --><?php //}?>
    </div>
</section>
<!-- ===== Projects ===== -->
<section class="demos mysection section1">
    <div class="ptext"><p>پروژه های اجرا شده</p></div>
    <div class="padingproj">
        <div class="large-12 columns">
            <div class="row1 margiproj">
                <div class="owl-carousel owl-theme">
                    <?php if ($slider1 != null) {
                        foreach ($slider1 as $slid1) {
                            $galery = \backend\models\Images::findOne($slid1->id_img); ?>

                            <div class="item myitem"><a class="size"><img
                                            src="<?= Yii::$app->request->hostInfo ?>/upload/<?= $galery->name; ?>"></a>
                            </div>

                            <?php
                        }
                    } ?>

                </div>
            </div>
        </div>
    </div>
</section>
<!-- About Section -->
</div>
