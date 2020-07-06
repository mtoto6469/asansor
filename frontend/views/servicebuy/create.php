<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Servicebuy */

$this->title = 'خرید سرویس پشتیبانی آسانسور';
$this->params['breadcrumbs'][] = ['label' => 'Servicebuys', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="service-img">
    <span class="dark_bg"></span>
</div>
<div class="servicebuy-create page_conten service-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'server' =>$server,
        
    ]); ?>

</div>
