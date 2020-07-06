<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TblcategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'دسته بندی';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblcategory-index col-sm-10">

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
            'name',
            [
                'attribute'=>'id_img',
                'value'=>function($model){
                    $img=\backend\models\Images::find()->where(['id'=>$model->id_img])->one();
                    if ($img){
                        return $img->name  ;
                    }else{
                        return null;
                    }
                },
            ],
           [
               'attribute'=> 'enable',
               'value'=>function($model){
                   if ($model->enable==1){
                       return 'نمایش داده میشود';
                   }else{
                       return ' نمایش داده نمیشود';
                   }
               },
           ],
//            'enable_view',
            //'description',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
