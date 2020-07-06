<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
$url=Yii::$app->urlManager;
$this->title = 'ورود';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login login_img">
<!--    <h1>--><?//= Html::encode($this->title) ?><!--</h1>-->

<!--    <p>Please fill out the following fields to login:</p>-->

    <div class="row1">
        <div class="col-lg-4 col-lg-offset-4 col-md-5 col-md-offset-3 col-sm-4 col-sm-offset-4 col-xs-8 col-xs-offset-2 login_bac">
            <div><h2>ورود</h2></div>
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true, 'placeholder'=>'username'])->label('نام کاربری') ?>

                <?= $form->field($model, 'password')->passwordInput(['placeholder'=>'password'])->label('پسورد') ?>

            <div class="form-group field-loginform-rememberme has-success">
                <label for="loginform-rememberme">
                    <input name="LoginForm[rememberMe]" value="0" type="hidden"><input id="loginform-rememberme" name="LoginForm[rememberMe]" value="1" checked="" aria-invalid="false" type="checkbox">
                    مرا به خاطر بسپار
                </label><div class="checkbox">

                    <p class="help-block help-block-error"></p>

                </div>
            </div>

                <div class="font_s" style="color:#000;margin:1em 0">
                    اگر پسورد خود را فراموش کرده اید :    <?= Html::a('reset it', ['site/request-password-reset']) ?>.
                </div>

                <div class="form-group">
<!--                    <button type="submit" class=" btn-success" name="login-button">ورود</button>-->
                    <?= Html::submitButton('ورود', ['class' => 'btn1 btn-success', 'name' => 'login-button']) ?>
                    <a class="btn1 btn-success" href="<?=$url->createAbsoluteUrl(['site/signup'])?>">ثبت نام</a>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
    
</div>
