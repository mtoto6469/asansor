<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Tblcategory */
/* @var $form yii\widgets\ActiveForm */

$session=Yii::$app->session;
if(!$session->isActive){
    $session->open();
}
if(isset($_SESSION['error'])){
    if ($_SESSION['error']!=null){
        echo'<div class="alert alert-danger">'. $_SESSION['error'].'</div>';
    }$_SESSION['error']=null;
}
?>

<div class="tblcategory-form ">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

<?php

    if ($img !=null){?>

        <option value="prompt">عکس را انتخاب کنید</option>

    <select id="tblcategory-id_img" class="form-control" name="Tblcategory[id_img]" aria-invalid="true">

       <?php foreach ($img as $images){?>
        <option value="<?=$images->id;?>"><?=$images->alert;?></option>
         <?php } ?>

    </select>
<?php

    }

    ?>

    <?= $form->field($model, 'description')->textarea(['roe' => 6]) ?>
    
    <?= $form->field($model, 'id_parent')->dropDownList($cat,['prompt'=>'دسته اصلی']) ?>

    <?= $form->field($model, 'enable')->radioList([0=>'خیر',1=>'بله']) ?>
    
    <?= $form->field($model, 'footer')->radioList([0=>'خیر',1=>'بله']) ?>

    <div class="form-group">
        <?= Html::submitButton('ذخیره', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
