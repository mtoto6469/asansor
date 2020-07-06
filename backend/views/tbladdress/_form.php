<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use moonland\tinymce\TinyMCE;

/* @var $this yii\web\View */
/* @var $model backend\models\Tbladdress */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tbladdress-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'address')->textarea(['rows' => 2]) ?>
    <p>توجه : شما میتوانید دوتا شماره تلفن را وارد کنید و بین انها از خط فاصله استفاده کنید</p>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'fax')->textInput() ?>
    <p>توجه : شما میتوانید دوتا شماره موبایل را وارد کنید و بین انها از خط فاصله استفاده کنید</p>


    <?= $form->field($model, 'mobile')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'textindex')->widget(TinyMCE::className()); ?>

    <?= $form->field($model, 'status')->radioList([0=>'خیر',1=>'بله'])->label('قابل نمایش در صفحه اصلی باشد')?>

    <?= $form->field($model, 'abutemy')->widget(TinyMCE::className()); ?>


    <div class="form-group">
        <?= Html::submitButton('ذخیره', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
