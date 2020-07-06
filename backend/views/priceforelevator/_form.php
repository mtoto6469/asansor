<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use moonland\tinymce\TinyMCE;

/* @var $this yii\web\View */
/* @var $model backend\models\Priceforelevator */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="priceforelevator-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'floorNamber')->dropDownList([5=>'5',6=>'6',7=>'7',8=>'8'])->label('تعداد طبقه') ?>

    <?= $form->field($model, 'floorStops')->textInput()->label('تعداد توقف') ?>

    <?= $form->field($model, 'speed')->textInput(['maxlength' => true])->label('سرعت') ?>

    <?= $form->field($model, 'capacity')->textInput(['maxlength' => true])->label('ظرفیت') ?>

    <?= $form->field($model, 'karbary')->dropDownList([1=>'مسافربری - مسکونی'])->label('نوع کاربری') ?>

    <?= $form->field($model, 'liftType')->textInput(['کششی'])->label('نوع آسانسور') ?>

    <?= $form->field($model, 'motortype')->textInput(['گیربکسی'])->label('نوع موتور') ?>
    
    <?= $form->field($model, 'instalLocation')->textInput(['تهران'])->label('محل نصب') ?>

    <?= $form->field($model, 'text')->widget(TinyMCE::className())->label('متن') ?>

    <?= $form->field($model, 'motor1')->textInput(['maxlength' => true])->label('موتور1') ?>

    <?= $form->field($model, 'motor2')->textInput(['maxlength' => true])->label('موتور2') ?>

    <?= $form->field($model, 'motor3')->textInput(['maxlength' => true])->label('موتور3') ?>

    <?= $form->field($model, 'description1')->textInput(['maxlength' => true])->label('توضیحات 1') ?>

    <?= $form->field($model, 'description2')->textInput(['maxlength' => true])->label('توضیحات 2 ') ?>

    <?= $form->field($model, 'description3')->textInput(['maxlength' => true])->label('توضیحات 3') ?>

    <?= $form->field($model, 'description4')->textInput(['maxlength' => true])->label('توضیحات 4') ?>

    <?= $form->field($model, 'description5')->textInput(['maxlength' => true])->label('توصیحات 5') ?>

    <?= $form->field($model, 'description6')->textInput(['maxlength' => true])->label('توضیحات 6') ?>

    <?= $form->field($model, 'enable')->radioList([0=>'غیر قابل نمایش',1=>'قابل نمایش'])->label('وضعیت نمایش') ?>

    <div class="form-group">
        <?= Html::submitButton('ذخیره', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
