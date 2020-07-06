<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Priceforelevator */

$this->title = 'ایجاد استعلام جدید';
$this->params['breadcrumbs'][] = ['label' => 'Priceforelevators', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="priceforelevator-create col-sm-10">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
