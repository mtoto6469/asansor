<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Learn */

$this->title = 'ایجاد';
$this->params['breadcrumbs'][] = ['label' => 'Learns', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="learn-create col-sm-10">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'img'=>$img,
//        'pcat'=>$pcat,
    ]) ?>

</div>
