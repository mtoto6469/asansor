<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PriceforelevatorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'استعلام قیمت آسانسور';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="priceforelevator-index col-sm-10">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('ایجاد استعلام', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
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
            //'capacity',
            //'karbary',
            //'liftType',
            //'motortype',
            //'instalLocation',
            //'text:ntext',
            //'motor1',
            //'motor2',
            //'motor3',
            //'description1',
            //'description2',
            //'description3',
            //'description4',
            //'description5',
            //'description6',
            //'enable',
            //'enable_view',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
