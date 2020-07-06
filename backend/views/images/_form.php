<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Images */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="images-form">

    <?php $form = ActiveForm::begin(); ?>
   <br> <p class="text-info">لطفا نام عکس ها را انگلیسی ذخیره کنید همچنین نام عکس با عکس مرتبط باشد . </p><br>

    <?= $form->field($modelup,'imageFile')->fileInput()?>

    <?= $form->field($model, 'alert')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dascription')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'slide')->radioList(['0'=>'غیر قابل نمایش','1'=>'نمایش']) ?>
    

<br><p class="text-info">لطفا فیلد های زیر را با دقت پر کنید چون آنها در سئوی سایت موثر هستند</p><br>
    <?= $form->field($model, 'meta_key')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'meta_title')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app','ذخیره'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
