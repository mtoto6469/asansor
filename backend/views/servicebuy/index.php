<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\components\jdf;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ServicebuySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Servicebuys';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="servicebuy-index col-sm-10">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Servicebuy', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'id_service',
//            'id_user',
            [
                'attribute' => 'id_user',
                'value' => function ($model) {
                    $username = "";
                    if ($model->id_user != null) {
                        $profile = \backend\models\Profile::find()->where(['id_user' => $model->id_user])->one();
                        $username = $profile->username;
                    }
                    return $username;
                },
                'label' => 'نام مدیر',
            ],
            'mobile',
            'address',
            'name',
            'family',
            'telephon',
            //'date',
            'date_ir',
            //'time',
            'time_ir',
            //'service_id_user',
            'repairman_name',
            //'confirm',
            //'enable_view',

            [
                'attribute'=>'validityduration',
                'value'=>function($model){
                    $x=$model->validityduration;
                    $service=\backend\models\Service::find()->where(['id'=>$model->id_service])->one();
                    if ($service){



                       $month=$service->duration;
//                        $date_ir= new jdf();
                        $date=date('Y-m-d',mktime(date('h'),date('i'),date('s'),date('m')+$month,date('d'),date('Y')));

                        $date=new jdf();
                        $date=$date->date('y-m-d',mktime(date('h'),date('i'),date('s'),date('m')+$month,date('d'),date('Y')));
//                        $date=$date->date('y-m-d',mktime(date('h'),date('i'),date('s'),date('m')+$month,date('d'),date('Y'))).' ' .$date->date('h-m-s');

                        return $date;
//                        $end_date_ir=$date_ir->date('Y/m/d');



                    }else{
                        return 'ggg';
                    }

                    }

            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
