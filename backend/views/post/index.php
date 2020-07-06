<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'مقالات';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-index col-sm-10">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('ایجاد مقاله جدید', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'title',
            'dascription',
//            'text:ntext',
             ['attribute'=>'indpage',
                 'value'=>function($model){
                     if ($model->indpage==1){
                         return 'نمایش در صفحه اصلی';
                     }else{
                         return null;
                     }
                 }
             ],
            ['attribute'=>'statuse',
                'value'=>function($model){
                    if ($model->statuse==1){
                        return 'انتشار';
                    }else{
                        return 'پیش نویس';
                    }
                }
            ],
            //'id_img',
            //'id_user',
            //'id_postcategory',
            ['attribute'=>'enable',
                'value'=>function($model){
                    if ($model->enable==1){
                        return 'قابل نمایش';
                    }else{
                        return 'غیر قابل نمایش';
                    }
                }
            ],
            //'enable_view',
            //'date',
            //'date_it',
            //'time',
            //'time_ir',
            //'link',
            //'mata_tag',
            //'mata_key',
            //'meta_title',
            //'meta_text',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
