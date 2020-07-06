<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MassegeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'پیغام ها';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="massege-index col-sm-10">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>

    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
//            'id_user',
//            'id_pro',
//            'text:ntext',
//            'welldimensions',
            'displacementheight',
            'Capacity',
            'hlfdc',
            'pit',
            'tell',
            'adrress',
//            'date',
            'date_ir',
            //'enable_view',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
