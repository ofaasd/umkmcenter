<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\typeahead\TypeaheadBasic;
$list_bulan = array(1=>"Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","Nopember","Desember");

/* @var $this yii\web\View */
/* @var $model app\models\Omset */
/* @var $form yii\widgets\ActiveForm */
$model->tahun = date('Y');
if(!empty($bulan)){
    $model->bulan = $bulan[0];
    $model->tahun = $bulan[1];
}

?>

<div class="omset-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'usaha_id')->dropDownList($usaha); ?>

    <?= $form->field($model, 'omset')->textInput() ?>

    <!-- <?= $form->field($model, 'penjualan')->textInput() ?> -->

    <?php //echo $form->field($model, 'bulan')->textInput() ?>
        
	<?= $form->field($model, 'bulan')->dropDownList($list_bulan) ?>
	
    <?= $form->field($model, 'tahun')->textInput() ?>
	
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
