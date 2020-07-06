<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Deliveryman */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Deliverymen', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="deliveryman-view col-sm-10">
    <div class="content">
        <div class="row padingwi">
            <div class="pricing-table hover1">
                <h4><i>شماره فاکتور : <?= $model->id_factor?></i></h4>
            </div>
            <div class="row">
                <div class="col-md-12  padingwi">

                    <h3>  شماره تماس</h3>
                    <p><?=$model->user_tel?></p>

                    <h3>  آدرس</h3>
                    <p><?=$model->user_address?></p>

                </div>
            </div>

            <div class="pricing-footer">

                <?php
                if($model->confirm==0){
                    echo Html::a(Yii::t('app', 'تحویل داده شد'), ['update','id'=>$model->id], ['class' => 'btn btn-success'])  ;

                }
                ?>

                </p>
            </div>
        </div>
    </div>

</div>
