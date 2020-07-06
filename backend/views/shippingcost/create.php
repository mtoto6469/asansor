<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Shippingcost */

$this->title = 'هزینه ارسال جدید';
$this->params['breadcrumbs'][] = ['label' => 'Shippingcosts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shippingcost-create col-sm-10">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
