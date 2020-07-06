<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Massege */

$this->title = 'ارسال پیام';
$this->params['breadcrumbs'][] = ['label' => 'Masseges', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="massege-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
