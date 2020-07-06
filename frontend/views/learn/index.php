<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\LearnSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Learns';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="learn-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Learn', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'dascription',
            'text:ntext',
            'id_img',
            //'id_user',
            //'id_postcategory',
            //'enable',
            //'enable_view',
            //'date',
            //'date_ir',
            //'time',
            //'time_ir',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
