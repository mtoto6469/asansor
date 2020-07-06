<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use moonland\tinymce\TinyMCE;

/* @var $this yii\web\View */
/* @var $model backend\models\Learn */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="learn-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_category')->dropDownList($pcat,['prompt'=>'لطفا دسته را انتخاب کنید '])->label('دسته بندی') ?>
    
    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dascription')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'text')->widget(TinyMCE::className()); ?>

    <?= $form->field($model, 'id_img')->dropDownList($img,['prompt'=>'لطفا عکس را انتخاب کنید '])->label('عکس') ?>

    <?= $form->field($model, 'enable')->radioList([0=>'غیر قابل نمایش باشد',1=>'قابل نمایش باشد'])->label('وضعیت نمایش')?>


    <div class="form-group">
        <?= Html::submitButton('ذخیره', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
