<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\TblexitSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tblexits';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblexit-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tblexit', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute'=>'id_pro',
                'value'=>function($model){
                    $prodoct=\backend\models\Tblproduct::find()->where(['id'=>$model->id_pro])->one();
                    return $prodoct->title;
                },
                'label'=>'نام محصول',
            ],
//            'enable_view',
            'exit',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
