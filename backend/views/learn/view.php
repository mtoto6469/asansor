<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Learn */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'مقالات آموزشی', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="learn-view col-sm-10">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('ویرایش', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
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
            'title',
            'dascription',
//            'text:ntext',
            [
                'attribute' => 'id_img',
                'value' => function ($model) {
                    $img = \backend\models\Images::find()->where(['id' => $model->id_img])->one();
//                    echo ' src="'.Yii::$app->request->hostInfo.'/upload/'. $img->name.'" >';
                    return $img->name;
                },
                'label' => 'نام عکس',
            ],
            [
                'attribute' => 'id_user',
                'value' => function ($model) {
                    $username = "";
                    if ($model->id_user != null) {
                        $profile = \backend\models\Profile::find()->where(['id_user' => $model->id_user])->one();
                        $username = $profile->name;
                    }
                    return $username;
                },
                'label' => 'نام کاربر',
            ],
//            'id_postcategory',
            [
                'attribute' => 'enable',
                'value' => function ($model) {
                    if ($model->enable == 1) {
                        return 'قابل نمایش';
                    } else {
                        return 'غیر قابل نمایش';
                    }
                }
            ],
//            'enable_view',
//            'date',
            'date_ir',
//            'time',
            'time_ir',
        ],
    ]) ?>

</div>
