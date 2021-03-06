<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Learn */

$this->title = 'Update Learn: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Learns', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="learn-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
