<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Post */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Posts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-view col-sm-10">

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
                'attribute' => 'statuse',
                'value' => function ($model) {
                    if ($model->statuse == 1) {
                        return 'انتشار';
                    } else {
                        return 'پیش نویس';
                    }
                }
            ],
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
            [
                'attribute' => 'id_postcategory',
                'value' => function ($model) {
                    $pcategory = \backend\models\Tblpostcategory::find()->where(['id' => $model->id_postcategory])->one();
                    if ($pcategory) {
                        return $pcategory->title;
                    } else {
                        return null;
                    }
                },
                'label' => 'نام دسته'
            ],

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
//            'date_it',
//            'time',
//            'time_ir',
//            'link',
//            'mata_tag',
//            'mata_key',
//            'meta_title',
//            'meta_text',
        ],
    ]) ?>

</div>
