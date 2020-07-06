<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Tblcategory */

$this->title = 'ایجاد دسته جدید';
$this->params['breadcrumbs'][] = ['label' => 'Tblcategories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblcategory-create col-sm-10">

    <h1><?= Html::encode($this->title) ?></h1>
    <?= $this->render('_form', [
        'model' => $model,
        'img'=>$img,
        'cat'=>$cat,
    ]) ?>

</div>
