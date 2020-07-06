<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Images */

$this->title = 'عکس';
$this->params['breadcrumbs'][] = ['label' => 'Images', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="images-create col-sm-10 " >

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'modelup'=>$modelup,
    ]) ?>

</div>
