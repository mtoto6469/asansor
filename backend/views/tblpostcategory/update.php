<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Tblpostcategory */

$this->title = 'به روز رسانی دسته: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Tblpostcategories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tblpostcategory-update col-sm-10">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'postcat'=>$postcat,
    ]) ?>

</div>
