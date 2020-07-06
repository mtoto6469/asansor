<?php
$url = Yii::$app->urlManager;
?>
<div class="c c1">
    <div class="page_image">
        <span class="dark_bg"></span>
    </div>
    <div class="page_conten">
        <div class="c"><h1 class="h1-margin">استعلام قیمت آسانسور</h1></div>
        <div class="main_con">
            <div class="c inquiry-c1">
                <div class="cx">
                    <?php if ($floor1 != null){
                        foreach ($floor1 as $f){?>
                       
                    <label class="margin_lable font_s">تعداد طبقات = <?= $f->floorNamber?></label>
                    <label class="margin_lable font_s">تعداد توقف = <?= $f->floorStops?></label>
                    <label class="margin_lable font_s">ظرفیت =<?= $f->speed?></label>
                    <label class="margin_lable font_s">سرعت =<?= $f->capacity?></label>

                </div>
                <div class="cx">
                    <label class="margin_lable font_s">نوع موتور =<?= $f->motortype?></label>
                    <label class="margin_lable font_s">کاربری = <?php if($f->karbary==1){echo "مسافربری - مسکونی";}?></label>
                    <label class="margin_lable font_s">نوع آسانسور =<?= $f->liftType?> </label>
                    <label class="margin_lable font_s">محل نصب =<?= $f->instalLocation?></label>
                </div>
            </div>
            <div class="text margin_lable ttext">
                <p><?= $f->text?></p>

            </div>
            <div class=" c inquiry-c2">
                <p>
                    <span class="margin_lable col-lg-3 col-md-4 col-sm-6 col-xs-12 fwidth" ><?= $f->motor1?></span>
                    <span class="margin_lable col-lg-3 col-md-4 col-sm-6 col-xs-12 fwidth" ><?= $f->motor2?></span>
                    <span class="margin_lable col-lg-3 col-md-4 col-sm-6 col-xs-12 fwidth" ><?= $f->motor3?></span>
                </p>
            </div>
            <div id="inquiry-c1"><span id="inquiry-c2" >قابل توجه مشتریان گرامی : در صورت انتخاب هر کدام از آپشن های ذیل مبلغ آن به را رقم استعلام فوق اضافه نمایید</span>
            </div>
            <div class=" c inquiry-c5" >

                    <span class="margin_lable col inquiry-c4" ><?= $f->description1?></span>
                    <span class="margin_lable col inquiry-c4" ><?= $f->description2?> </span>
                    <span class="margin_lable col inquiry-c4" ><?= $f->description3?></span>

            </div>
            <div class=" c inquiry-c5" >

                <span class="col margin_lable inquiry-c4" ><?= $f->description4?></span>
                <span class="col margin_lable inquiry-c4" ><?= $f->description5?></span>
                <span class="col margin_lable inquiry-c4" ><?= $f->description6?></span>
            </div>
            <?php
            }
            }?>

            <?php
         if (!Yii::$app->user->isGuest){
             $user=\common\models\User::findOne(Yii::$app->user->getId());?>
             <div id="btn">
                 <a class="btn-blue" href="<?= $url->createAbsoluteUrl('massege/service_maintenance') ?>" >ورود</a>
             </div>
            <?php
         }else{?>
             <div id="btn">
                 <a class="btn-blue" href="<?= $url->createAbsoluteUrl('site/login') ?>" >ورود</a>
             </div>
          <?php
         }
            ?>

        </div>
    </div>
</div>
