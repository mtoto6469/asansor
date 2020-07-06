<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\FactorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'سفارشات';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="factor-index col-sm-10">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            ['attribute'=>'visible',
//                'value'=>function($row){
//                    if ($row->visible==0){
//                        return '<p>مشاهده نشد</p>';
//                    }else{
//                        return '<p>مشاهده شد</p>';
//                    }
//                },
//                'format'=>'html',
//            ],
            ['attribute'=>'print',
                'value'=>function ($row){
                    if ($row->print == 0 ) {
                        return '<p  >بسته بندی نشد</p>';
                    } else {
                        return '<p >بسته بندی شد</p>';
                    }
                },
                'label'=>'بسته بندی',
                'format'=>'html',
            ],
            ['attribute'=>'resive',
                'value'=>function ($row){
                    if ($row->resive == 0 ) {
                        return '<p  >ارسال نشده</p>';
                    } else {
                        return '<p >ارسال شد</p>';
                    }
                },
                'label' => 'وضعیت ارسال',
                'format'=>'html',
            ],


            ['attribute' => 'confirm',
                'value' => function ($row) {
                    if ($row->confirm == 0 || $row->confirm == 1) {
                        return '<p  >تایید نشده</p>';
                    } else {
                        return '<p >تایید شده</p>';
                    }

                },
                'label' => 'وضعیت',
                'format' => 'html',

            ],
            ['attribute' => 'price',
                'value' => function ($row) {
                    return '<p  >'. $row->price . '</p>';

                },
                'label' => 'قیمت',
                'format' => 'html',

            ],

//            'id',
//            'ref',
//            'id_user',
//            'price',
//            'description:ntext',
            //'date',
            //'date_ir',
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

            ['class' => 'yii\grid\ActionColumn',
            'template' => ' {delete} {view} {chenge}'],
        ],
    ]); ?>
</div>
