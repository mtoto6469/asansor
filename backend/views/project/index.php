<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProjectSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'پروژه ها';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-index col-sm-10">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('ایجاد پروزه جدید', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'title',
            'place',
            'startdate:ntext',
            'enddate:ntext',
            'karfarmaname',
            [
                'attribute'=>'statuse',
                'value'=>function($model){
                    if ($model->statuse==1){
                        return 'در دست اجرا';
                    }elseif ($model->statuse==2){
                        return 'پایان یافته';
                    }
                },
            ],
            //'id_img',
            //'id_user',
            //'date',
            //'date_ir:ntext',
            //'time',
            //'time_ir:ntext',
            //'slider',
            //'footer',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
