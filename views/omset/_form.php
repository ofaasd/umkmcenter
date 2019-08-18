<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\typeahead\TypeaheadBasic;
$bulan = array(1=>"Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","Nopember","Desember");

/* @var $this yii\web\View */
/* @var $model app\models\Omset */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="omset-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'usaha_id')->dropDownList($usaha); ?>

    <?= $form->field($model, 'omset')->textInput() ?>

    <!-- <?= $form->field($model, 'penjualan')->textInput() ?> -->

    <?php //echo $form->field($model, 'bulan')->textInput() ?>
        
	<?= $form->field($model, 'bulan')->dropDownList($bulan) ?>
	
	<div class="form-group">
	    <label for="bulan" class="control-label">Tahun</label>
	    <input type="number" name="tahun" class="form-control" value="<?= (isset($tahun))?$tahun:date('Y'); ?>">
	</div>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
