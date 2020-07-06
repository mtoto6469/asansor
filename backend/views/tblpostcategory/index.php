<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TblpostcategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tblpostcategories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblpostcategory-index col-sm-10">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('ایجاد دسته جدید', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            [
                    'attribute' => 'id_parent',
                    'value' => function ($model){
                        $parent = \backend\models\Tblpostcategory::find()->where(['id'=>$model->id_parent])->one();

                        if($parent){
                            return $parent->title;
                        }
                        else{
                            return "null";
                        }
                    },
                    'label'=>'دسته'
            ],
            'description',
            [
              'attribute'=>'enable',
                'value'=>function($model){
                    if ($model->enable==1){
                        return ' قابل نمایش ';
                    }else{
                        return ' غیر قابل نمایش';
                    }
                },
            ],

//            [
//                'attribute'=>'footer',
//                'value'=>function($model){
//                    if ($model->footer==1){
//                        return '<p> قابل تمایش </p>';
//                    }else{
//                        return '<p> غیر قابل نمایش</p>';
//                    }
//                },
//            ],
//            'id_parent',
//            'model'=>$model,
            //'enable_view',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
