<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Tbladdress */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Tbladdresses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbladdress-view col-sm-10">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('ویرایش', ['Update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('حذف', ['Delete', 'id' => $model->id], [
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
//            'id',
            'address:ntext',
            'phone',
            'mobile',
            'textindex:ntext',
            'abutemy:ntext',
            ['attribute'=>'statuse',
                'value'=>function($model){
                    if ($model->status==1){
                        return 'متن در حال نمایش در صفحه اصلی ';
                    }else{
                        return 'متن نمایش داده نمیشود';
                    }
                }
            ],
            ['attribute'=>'enable',
                'value'=>function($model){
                    if ($model->status==1){
                        return 'قابل نمایش ';
                    }else{
                        return 'غیر قابل نمایش';
                    }
                }
            ],
//            'enable_view',
        ],
    ]) ?>

</div>
