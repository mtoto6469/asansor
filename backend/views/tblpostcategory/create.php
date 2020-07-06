<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Tblpostcategory */

$this->title = 'ایجاد دسته جدید';
$this->params['breadcrumbs'][] = ['label' => 'Tblpostcategories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tblpostcategory-create col-sm-10">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'postcat'=>$postcat,
    ]) ?>

</div>
