<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Massege */

$this->title = 'ارسال پیام';
$this->params['breadcrumbs'][] = ['label' => 'Masseges', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="massege-create">
    <div class="abut_image">
        <span class=" "></span>
    </div>
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_formhidro', [
        'model' => $model,
    ]) ?>

</div>
