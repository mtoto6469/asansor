<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Pardakht */

$this->title = 'ثبت عدم تایید';
$this->params['breadcrumbs'][] = ['label' => 'Pardakhts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pardakht-create col-sm-10">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'factor'=>$factor,
        'user'=>$user,
    ]) ?>

</div>
