<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Servicebuy */

$this->title = 'Create Servicebuy';
$this->params['breadcrumbs'][] = ['label' => 'Servicebuys', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="servicebuy-create col-sm-10">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
