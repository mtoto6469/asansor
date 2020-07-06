<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Massege */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="massege-form col-sm-10 col-lg-offset-1">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput() ?>
    
    <?= $form->field($model, 'tell')->textInput() ?>

    <?= $form->field($model, 'adrress')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'welldimensions')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'displacementheight')->textInput() ?>

    <?= $form->field($model, 'Capacity')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hlfdc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pit')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'text')->textarea(['rows' => 6])->label('توضیحات') ?>
    

    <div class="form-group">
        <?= Html::submitButton('ارسال', ['class' => 'btn btn-blue ']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
