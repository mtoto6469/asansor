<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Profile */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="profile-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true])->label('نام') ?>

    <?= $form->field($model, 'family')->textInput(['maxlength' => true])->label('نام خانوادگی') ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true])->label('نام کاربری') ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true])->label('کلمه عبور') ?>

    <?= $form->field($model, 'mobile')->textInput(['maxlength' => true])->label('تلفن همراه') ?>

    <?= $form->field($model, 'telephone')->textInput(['maxlength' => true])->label('تلفن ثابت') ?>

    <?= $form->field($model, 'ostan')->textInput(['maxlength' => true])->label('استان') ?>

    <?= $form->field($model, 'city')->textInput(['maxlength' => true])->label('شهر')  ?>

    <?= $form->field($model, 'location')->textInput(['maxlength' => true])->label('منطقه')  ?>

    <?= $form->field($model, 'address')->textarea(['rows' => 6])->label('آدرس')  ?>

    <?= $form->field($model, 'postal_code')->textInput()->label('کدپستی')  ?>

    <?= $form->field($model, 'id_credit')->textInput()->label('مقدار اعتبار')  ?>

    <div class="form-group">
        <?= Html::submitButton('ذخیره', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
