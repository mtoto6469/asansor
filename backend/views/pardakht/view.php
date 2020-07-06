<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Pardakht */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Pardakhts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pardakht-view col-sm-10">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['تایید', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['عدم تایید', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
           [
               'attribute'=> 'id_user',
               'value'=>function($model){
                   if ($model->id_fac==0){
                       $user=\common\models\User::find()->where(['id'=>$model->id_fac])->one();
                       return $user->username;
                   }else{
                       $factor=\backend\models\Factor::find()->where(['id'=>$model->id_fac])->one();
                       $user=\common\models\User::find()->where(['id'=>$factor->id_user])->one();
                       return $user->username;
                   }
               },
               'label'=>'نام کاربری'
           ],
            ['attribute'=>'id_fac',
                'value'=>function($model){
                    if($model->id_fac==0){

                    }else{
                        $factore=\backend\models\Factor::find()->where(['id'=>$model->id_fac])->one();
                        return $factore->price;
                    }
                },
                'label'=>'قیمت فاکتور',
            ],
            'price',
            'endnamber',
            'paygiri',
//            'admin_description',
//            'enable',
//            'approve',
            'date_u',
        ],
    ]) ?>

</div>
