<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Deliveryman */

$this->title = 'ایجاد';
$this->params['breadcrumbs'][] = ['label' => 'Deliverymen', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="deliveryman-create col-sm-10">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
