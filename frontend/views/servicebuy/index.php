<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ServicebuySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Servicebuys';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="servicebuy-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Servicebuy', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    

<!--    --><?//= GridView::widget([
//        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
//        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],
//
//            'id',
//            'id_service',
//            'id_user',
//            'mobile',
//            'address',
//            //'name',
//            //'family',
//            //'telephon',
//            //'date',
//            //'date_ir',
//
//            ['class' => 'yii\grid\ActionColumn'],
//        ],
//    ]); ?>
</div>
