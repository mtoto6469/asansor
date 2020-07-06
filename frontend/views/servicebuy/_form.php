<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Servicebuy */
/* @var $form yii\widgets\ActiveForm */
//$serviceid=$_GET['id'];
//$servicefloor=$_GET['floornamber'];
//$servicenumber=$_GET['numderstop'];
//$servicedur=$_GET['duration'];
//$servicepri=$_GET['price'];
//echo $servicepri;exit();
//var_dump($serviceid);
//exit();

?>
<table class="table font_xs ">
    <thead>

    <tr>
        <th scope="col">تعداد طبقه</th>
        <th scope="col">تعداد توقف</th>
        <th scope="col">مدت</th>
        <th scope="col">قیمت</th>

    </tr>
    </thead>
    <tbody>

            <tr>
                <?php

                if(isset($server) && $server!=null){?>
                    <th scope="col"><?=$server->floornamber?></th>
                    <th scope="col"><?=$server->numderstop?></th>
                    <th scope="col"><?= $server->duration?> ماه</th>
                    <th scope="col"><?= $server->price?>تومان</th>
                <?php

                }

                ?>

            </tr>

    </tbody>
</table>

<div class="servicebuy-form service-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true])->label('نام') ?>

    <?= $form->field($model, 'family')->textInput(['maxlength' => true])->label('نام خانوادگی') ?>
    
    <?= $form->field($model, 'mobile')->textInput(['maxlength' => true])->label('موبایل ') ?>

    <?= $form->field($model, 'telephon')->textInput(['maxlength' => true])->label('تلفن ثابت') ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true])->label('آدرس کامل') ?>
    
    <div class="btn">
        <?= Html::submitButton('درگاه پرداخت', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
