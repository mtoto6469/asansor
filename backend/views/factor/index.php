<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\FactorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'فاکتورها';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="factor-index col-sm-10">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
<!---->
<!--    <p>-->
<!--        --><?//= Html::a('Create Factor', ['create'], ['class' => 'btn btn-success']) ?>
<!--    </p>-->

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
           'ref',
//            'id_user',
            ['attribute' => 'price',
                'value' => function ($row) {
                    return  $row->price ;

                },
            ],

           [
                'attribute'=>'id_user',
                'value'=>function($row){
                    $user=\backend\models\Profile::find()->where(['id_user'=>$row->id_user])->one();
                   return$user->name;
                },
            ],

            [
                'attribute'=>'date_ir',
                'value'=>function($row){
                    return  $row->date_ir;
                },
            ],
//            'description:ntext',
            //'date',
//            'date_ir',
            //'resive',
            //'visibel',
            //'print',
            //'confirm',
            //'telephone',
            //'receive_type',
            //'enable',
            //'enable_view',
            //'address',
            //'location',
            //'etebar',
            //'face_id_user',
            //'atu',
            //'time',
            //'time_ir',

        ['class' => 'yii\grid\ActionColumn','template'=>'{view}']
        ],
    ]);
    ?>
</div>

