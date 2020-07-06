<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Massege */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Masseges', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="massege-view col-sm-10">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('به روزرسانی', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('حذف', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
//            'id',
            'name',
            'tell',
            'adrress',
//            ['attribute'=>'id_user',
//                'value'=>function($model){
//                    $user=\backend\models\Profile::find()->where(['id_user' => $model->id_user])->one();
//                    return $user->username;
//                }
//            ],
//            ['attribute'=>'id_pro',
//                'value'=>function($model){
//                    $pro=\backend\models\Tblproduct::findOne($model->id_pro);
//                    return $pro->title;
//                }
//            ],
            'text:ntext',
            'welldimensions',
            'displacementheight',
            'Capacity',
            'hlfdc',
            'pit',
//            'date',
            'date_ir',
//            'enable_view',
        ],
    ]) ?>

</div>
