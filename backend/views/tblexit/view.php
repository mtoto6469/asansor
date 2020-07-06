<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Tblexit */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'موجودی', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblexit-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['ویرایش', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['حذف', 'id' => $model->id], [
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
            'id',
            ['attribute'=>'id_pro',

                'value'=>function($model){
                    $prodoct=\backend\models\Tblproduct::find()->where(['id'=>$model->id_pro])->one();
                    return $prodoct->name;
                }
            ],
//            'enable_view',
            'exit',
        ],
    ]) ?>

</div>
