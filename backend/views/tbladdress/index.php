<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TbladdressSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = ' آدرس شرکت';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbladdress-index col-sm-10">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('ساخت ادرس جدید', ['Create Tbladdress'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'address:ntext',
            'phone',
            'mobile',
//            'textindex:ntext',
            ['attribute'=>'statuse',
                'value'=>function($model){
                    if ($model->status==1){
                        return 'متن در حال نمایش در صفحه اصلی ';
                    }else{
                        return 'متن نمایش داده نمیشود';
                    }
                }
            ],
            //'abutemy:ntext',
            //'enable',
            //'enable_view',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
