<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Project */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Projects', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-view col-sm-10">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('به روز رسانی پروزه ها', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('حذف', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'place',
            'startdate:ntext',
            'enddate:ntext',
            'karfarmaname',
            [
                'attribute'=>'statuse',
                'value'=>function($model){
                    if ($model->statuse==1){
                        return 'قابل نمایش';
                    }else{
                        return 'غیر قابل نمایش';
                    }
                }
            ],
            [
                'attribute'=>'id_img',
                'value'=>function($model){
                    $img=\backend\models\Images::find()->where(['id'=>$model->id_img])->one();
                    if ($img){
                        return $img->name;
                    }else{
                        return null;
                    }
                },
                'label'=>'عکس'
            ],
            [
                'attribute'=> 'id_user',
                'value'=>function($model){
                },
                'label'=>'نام کاربر'
            ],
//            'date',
            'date_ir:ntext',
//            'time',
            'time_ir:ntext',
            [
                'attribute'=>'slider',
                'value'=>function($model){
                    if ($model->slider==1){
                        return ' در اسلایدر صفحه اصلی نمایش داده میشور';
                    }else{
                        return 'در اسلایدر یفحه اصلی نمایش داده نمیشود';
                    }
                }
            ],
//            'footer',
        ],
    ]) ?>

</div>
