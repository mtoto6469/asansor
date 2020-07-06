<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'شرکت پایدار نیرو آسانبر ';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <div class="abut_image">
        <span class=" "></span>
    </div>
    <div class="abutme">
        <div class="col-lg-12 col-lg-offset-0  main_con1">
            <h1><?= Html::encode($this->title) ?></h1>
            <?php $address = \backend\models\Tbladdress::find()->where(['enable_view' => 1])->all();
            if ($address) {
                foreach ($address as $a) { ?>
                    <p class="pp"><?= $a->abutemy ?></p>
                    <?php
                }
            } else {
                ?>
                <p class="pp">تماس با ما : 77577332-021</p>
                <?php
            }
            ?>

            <p>:</p>

            <code><?= __FILE__ ?></code>
        </div>
    </div>
</div>
