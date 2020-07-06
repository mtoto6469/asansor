<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Pardakht */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pardakht-form">

    <?php $form = ActiveForm::begin();
    if ($factor != 0){?>
    <p>خطای پرداخت برای کاربر ارسال شود  <?= $user->username ?>قیمت فاکتور<?= $factor->price ?></p>
      
    <?php
    }else{?>
        <p>افزایش اعتبار برای کاربر</p>
     <?php
        $user->username;
    }
    ?>

   <div class="row">
       <div>
           <ul>
               <li>شماره پیگیری</li>
               <li>4 رقم آخر کارت</li>
               <li>قیمت پرداختی</li>
               <li>تاریخ پرداخت</li>
           </ul>
           <div>
               <ul>
                   <li><?= $model->paygiri ?></li>
                   <li><?= $model->endnamber?></li>
                   <li><?= $model->price?></li>
                   <li><?= $model->date_u?></li>
               </ul>
           </div>
       </div>


    <?= $form->field($model, 'admin_description')->textInput(['maxlength' => true])->label('علت عدم تایید') ?>


    <div class="form-group">
        <?= Html::submitButton('ارسال', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
   </div>

</div>
