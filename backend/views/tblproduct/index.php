<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TblproductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'محصولات';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblproduct-index col-sm-10">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('ایجاد محصول جدید', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
             ['attribute'=>  'id_category',
                 'value'=>function($model){
                     $category=\backend\models\Tblcategory::find()->where(['id'=>$model->id_category])->one();
                     if ($category){
                         return $category->name;
                     }else{
                         return null;
                     }
                 },
             ],
            'title',
            'price',
//            'description',
            'brand',

            //'enable',
            //'enable_view',
            //'cont',
            //'exit',
            //'emtiaz',
            //'meta_title',
            //'meta_tag',
            //'meta_text',
            //'meta_key',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
