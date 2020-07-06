<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Tblexit */

$this->title = 'Create Tblexit';
$this->params['breadcrumbs'][] = ['label' => 'Tblexits', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblexit-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'pro'=>$pro,
    ]) ?>

</div>
