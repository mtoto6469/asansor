<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\MassegeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Masseges';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="massege-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Massege', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'id_user',
//            'id_pro',
            'text:ntext',
//            'welldimensions',
            //'displacementheight',
            //'Capacity',
            //'hlfdc',
            //'pit',
            //'date',
            //'date_ir',
            //'enable_view',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
