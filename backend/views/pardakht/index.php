<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\PardakhtSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'پرداختی ها';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pardakht-index col-sm-10">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Pardakht', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'id_user',
            'id_fac',
            'price',
            'endnamber',
            //'oaygiri',
            //'admin_description',
            //'enable',
            //'approve',
            //'date_u',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
