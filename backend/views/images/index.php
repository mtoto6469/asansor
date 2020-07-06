<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ImagesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'گالری';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="images-index col-sm-10">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('ذخیره عکس', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
'name',
//            'id',
            'alert',
            'dascription',
            [
                'attribute'=> 'slide',
                'value'=>function($model){
                    if ($model->slide==1){
                        return 'نمایش در اسلایدر صفحه اصلی';
                    }else{
                        return null;
                    }
                }
            ],
//            'meta_key',
            //'meta_title',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
