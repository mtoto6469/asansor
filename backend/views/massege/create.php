<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Massege */

$this->title = 'ایجاد پیغام جدید';
$this->params['breadcrumbs'][] = ['label' => 'پیغامها', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="massege-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
