<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Tblpostcategory */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tblpostcategory-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true])->label('عنوان') ?>

    <?= $form->field($model, 'id_parent')->dropDownList($postcat,['prompt'=>'دسته اصلی'])->label('') ?>

    <?= $form->field($model, 'description')->textarea(['maxlength' => true])->label('توضیحات') ?>

    <?= $form->field($model, 'enable')->radioList([0=>'غیر قابل نمایش باشد',1=>'قابل نمایش باشد'])->label('وضعیت نمایش') ?>

    <div class="form-group">
        <?= Html::submitButton('ذخیره', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
