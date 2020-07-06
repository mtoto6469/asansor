<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use moonland\tinymce\TinyMCE;

/* @var $this yii\web\View */
/* @var $model backend\models\Post */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="post-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($model, 'id_postcategory')->dropDownList($pcat,['prompt'=>'دسته'])->label('دسته') ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dascription')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'indpage')->radioList([0=>'خیر',1=>'بله'])->label('قابل نمایش در صفحه اصلی باشد')?>

    <?= $form->field($model, 'text')->widget(TinyMCE::className()); ?>

    <?= $form->field($model, 'statuse')->dropDownList([0=>'پیش نویس',1=>'انتشار'])->label('وضعیت ') ?>

    <?= $form->field($model, 'id_img')->dropDownList($img,['prompt'=>'لطفا عکس را انتخاب کنید '])->label('عکس') ?>

    <?= $form->field($model, 'enable')->radioList([0=>'غیر قابل نمایش باشد',1=>'قابل نمایش باشد'])->label('وضعیت نمایش')?>

    <p>لطفا فیلد های زیر را بادقت پر کنید</p>

    <?= $form->field($model, 'link')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mata_tag')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mata_key')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'meta_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'meta_text')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('ذخیره', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
