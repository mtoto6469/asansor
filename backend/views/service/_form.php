<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Service */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="service-form ">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'floornamber')->textInput()->label('تعداد طبقات') ?>

    <?= $form->field($model, 'numderstop')->textInput()->label('تعداد تو قف') ?>

    <?= $form->field($model, 'duration')->textInput()->label('مدت اعتبار(ماه)') ?>

    <?= $form->field($model, 'price')->textInput()->label('قیمت') ?>

    <?= $form->field($model, 'enable')->radioList([0=>'غیرقابل نمایش',1=>'قابل نمایش']) ?>

    <div class="form-group">
        <?= Html::submitButton('ثبت', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
