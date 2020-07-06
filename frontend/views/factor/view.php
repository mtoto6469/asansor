<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Factor */

$this->title = $model->price;
$this->params['breadcrumbs'][] = ['label' => 'Factors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="factor-view col-sm-10">

    <h1> قیمت کل : <?= Html::encode($this->title) ?></h1>

    <p>
<!--        --><?//= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
<!--        --><?//= Html::a('Delete', ['delete', 'id' => $model->id], [
//            'class' => 'btn btn-danger',
//            'data' => [
//                'confirm' => 'Are you sure you want to delete this item?',
//                'method' => 'post',
//            ],
//        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'ref',
//            'id_user',
            'price',
//            'description:ntext',
            'date',
            'date_ir',
//            'resive',
//            'visibel',
//            'print',
//            'confirm',
//            'telephone',
//            'receive_type',
//            'enable',
//            'enable_view',
//            'address',
//            'location',
//            'etebar',
//            'face_id_user',
//            'atu',
            'time',
            'time_ir',
        ],
    ]) ?>

</div>
