<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Priceforelevator */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Priceforelevators', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="priceforelevator-view col-sm-10">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('ویرایش', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('حذف', ['delete', 'id' => $model->id], [
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
                     $username="";
                     if ($model->id_user!=null){
                     $profile=\backend\models\Profile::find()->where(['id_user'=>$model->id_user])->one();
                         $username=$profile->name;
                     }else{
                         return $username;
                     }
                     return $username;
                 },
                 'label'=>'نام کاربر'
             ],
            'floorNamber',
            'floorStops',
            'speed',
            'capacity',
            [
                'attribute'=> 'karbary',
                'value'=>function($model){
                 if ($model->karbary==1){
                        return 'مسافربری - مسکونی';
                    }
                    elseif ($model->karbart==2) {
                        return '';
                    } else{
                        return null;}
                }
            ],
            'liftType',
            'motortype',
            'instalLocation',
            'text:ntext',
            'motor1',
            'motor2',
            'motor3',
            'description1',
            'description2',
            'description3',
            'description4',
            'description5',
            'description6',
            ['attribute'=> 'enable',
                'value'=>function($model){
                    if ($model->karbary==1){
                        return 'قابل نمایش';
                    }
                    else {
                        return 'غیزر قابل نمایش';
                    }
                }],
        ],

//            'enable_view',

    ]) ?>

</div>
