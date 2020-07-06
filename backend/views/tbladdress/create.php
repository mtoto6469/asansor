<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Tbladdress */

$this->title = 'آدرس جدید ';
$this->params['breadcrumbs'][] = ['label' => 'Tbladdresses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tbladdress-create col-sm-10">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
