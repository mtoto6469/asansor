<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use moonland\tinymce\TinyMCE;
/* @var $this yii\web\View */
/* @var $model backend\models\Project */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="project-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->widget(TinyMCE::className()) ?>

    <?= $form->field($model, 'place')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'startdate')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'enddate')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'karfarmaname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'statuse')->dropDownList([1=>'درحال اجرا',2=>'اجرا شده'])->label('وضعیت پروژه :') ?>

    <?= $form->field($model, 'id_img')->dropDownList($img,['prompt'=>'عکس پروژه'])->label('عکس') ?>

    <?= $form->field($model, 'slider')->radioList([0=>'خیر',1=>'بله'])->label('قابل نمایش دراسلایدر صفحه اصلی باشد') ?>

    <?= $form->field($model, 'enable')->radioList([0=>'غیر قابل نمایش',1=>'قابل نمایش'])->label('وضعیت نمایش')?>


    <div class="form-group">
        <?= Html::submitButton('ذخیره', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
