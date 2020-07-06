<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Tblpostcategory */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Tblpostcategories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblpostcategory-view col-sm-10">

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
            ['attribute'=>'id_parent',
                'value'=>function($model){
                    $pcategory=\backend\models\Tblpostcategory::find()->where(['id'=>$model->id_parent])->one();
                    if ($pcategory){
                        return $pcategory->title;
                    }else{return null;}
                }
            ],
            'description',
            ['attribute'=>'enable',
                'value'=>function($model){
                    if ($model->enable==1){
                        return 'قابل نمایش';
                    }else{
                        return'غیر قابل نمایش';
                    }
                }
            ],
//            'enable_view',
//            'footer',
        ],
    ]) ?>

</div>
