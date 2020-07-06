<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Learn */

$this->title = 'Create Learn';
$this->params['breadcrumbs'][] = ['label' => 'Learns', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="learn-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
