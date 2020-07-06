<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Tblproduct */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tblproduct-form ">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
  
    <?= $form->field($model, 'id_category')->dropDownList($cat) ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'brand')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_img')->dropDownList($img) ?>

    <?= $form->field($model, 'cont')->textInput() ?>

    <?= $form->field($model, 'enable')->radioList([1=>'قابل مشاهده',0=>'غیر قابل مشاهده']) ?>
    
    <label>توجه : فیلد های زیر برای ستوی سایت است لطفا با دقت پر شود.</label>

    <?= $form->field($model, 'meta_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'meta_tag')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'meta_text')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'meta_key')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('ذخیره', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
