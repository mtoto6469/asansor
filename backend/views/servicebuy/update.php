<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Servicebuy */
$user=\backend\models\Profile::find()->where(['role'=>['admin','ادمین']])->orWhere(['role'=>['writer','منشی']])->one();
$this->title = 'Update Servicebuy: ' . $user->username;
$this->params['breadcrumbs'][] = ['label' => 'Servicebuys', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="servicebuy-update col-sm-10">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
