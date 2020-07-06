<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

\backend\assets\AppAssetLogin::register($this);
$url=Yii::$app->urlManager;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>ورود</title>

    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody()?>
<div>
<div><h3>لطفا نام کاربری خود را وارد کنید :</h3></div>
    <div>
        <?= Breadcrumbs::widget([
            'links'=>isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ])?>
        <?=Alert::widget()?>
        <?= $content ?>
    </div>
    </div>
<?= $this->endBody()?>
</body>
</html>
<?php $this->endPage() ?>
