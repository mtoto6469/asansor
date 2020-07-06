<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Tblproduct */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Tblproducts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblproduct-view col-sm-10">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('به روز رسانی', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
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
            'price',
            'description',
            'brand',
            'cont',
            ['attribute'=>'id_category',
                'value'=>function($model){
                    $category=\backend\models\Tblcategory::find()->where(['id'=>$model->id_category])->one();
                    return $category->name;
                }
            ],

            ['attribute'=>'id_img',
                'value'=>function($model){
                    $img=\backend\models\Images::find()->where(['id'=>$model->id_img])->one();
                    if ($img){
                        return $img->name;
                    }else{
                        return null;
                    }
                }
            ],

            ['attribute'=> 'enable',
                'value'=>function($model){
                    if ($model->enable==1){
                        return 'قابل نمایش';
                    }else{
                        return 'غیرقالب نمایس';
                    }
                }
            ],
//            'enable_view',

//            'exit',
//            'emtiaz',
//            'meta_title',
//            'meta_tag',
//            'meta_text',
//            'meta_key',
        ],
    ]) ?>

</div>
