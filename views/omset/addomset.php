<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Omset */
use yii\widgets\ActiveForm;
$this->title = 'Create Omset';
$this->params['breadcrumbs'][] = ['label' => 'Omsets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$list_bulan = array(1=>"Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","Nopember","Desember");
$model->bulan = $bulan;
?>
<div class="omset-create">

    <h1><?= Html::encode($this->title) ?></h1>

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

</div>
