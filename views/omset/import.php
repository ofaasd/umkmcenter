<?php
use yii\helpers\Html;
use yii\helpers\Url;
?>
<a href="<?= Url::base(); ?>/asset/excel/dummy_table.xlsx" class="btn btn-primary">Donwload File Sample</a>
<div class="row">
	<form method="POST" ENCTYPE="MULTIPART/FORM-DATA">
		<input type="hidden" name="_csrf" value="<?=Yii::$app->request->getCsrfToken()?>" />
		<div class="form-group">
			<label for="Import">Import Excel File</label>
			<input type="file" name="excel" class="form-control">
		</div>
		<input type="hidden" name="id" value="<?= $id ?>">
		<div class="form-group">
			<input type="submit" value="Simpan" class="btn btn-primary">
		</div>	
	</form>
</div>