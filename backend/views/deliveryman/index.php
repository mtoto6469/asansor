<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\DeliverymanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'پستچی';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="deliveryman-index col-sm-10">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<!--    <p>-->
<!--        --><?//= Html::a('Create Deliveryman', ['create'], ['class' => 'btn btn-success']) ?>
<!--    </p>-->

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            ['attribute' => 'id_devliveryman',
                'value' => function ($row) {
                    return '<p  >'. $row->username . '</p>';

                },
                'label' => 'نام پستجی',
                'format' => 'html',

            ],
            'id_factor',
            'confirm',
            'user_tel',
            //'user_address:ntext',
            //'date',
            //'date_ir',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
