<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Tblexit */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tblexit-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_pro')->dropDownList($pro,['prompt'=>'انتخاب کنید','onclick'=>'sendFirstpost()'])->label('نام محصول')?>

    <?= $form->field($model, 'exit')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('ثبت', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
