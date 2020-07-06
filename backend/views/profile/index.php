<?php

use yii\helpers\Html;
use yii\grid\GridView;

use common\models\User;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProfileSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'پنل کاربری';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profile-index col-sm-10">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('تعریف کاربر جدید', ['site/signup'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'name',
            'family',
            'email:email',
            'username',
            //'password',
            //'mobile',
            //'telephone',
//            ['attribute'=>'id_user',
//                'value'=>function($model){
//                    $user=User::findOne($model->id_user);
//                    return $user->username;
//                },
//                'label'=>'نام کاربری'
//            ],
            //'id_user',
            //'ostan',
            //'city',
            //'location',
            //'address:ntext',
            //'postal_code',
            //'date',
            //'date_ir',
            //'enable_view',
            'role',
            //'id_credit',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
