<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'ثبت نام';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup pad signup_img">


    <div class="row1">
        <div class="col-lg-6 col-lg-offset-3 col-md-5 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-8 col-xs-offset-2 login_bac">
            <h1><?= Html::encode($this->title) ?></h1>

            <p>لطفا این فیلدها را با دقت پر کنید:</p>
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true,'placeholder'=>'username'])->label('نام کاربری') ?>

                <?= $form->field($model, 'password')->passwordInput(['placeholder'=>'password'])->label('پسورد') ?>

                <?= $form->field($model, 'email')->label('ایمیل') ?>

                <?= $form->field($model, 'mobile')->textInput(['autofocus' => true,'placeholder'=>'09122222430'])->label('شماره موبایل') ?>

                <div class="form-group">
                    <?= Html::submitButton('ثبت نام', ['class' => ' btn-blue', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
