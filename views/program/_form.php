<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap4\Modal;

/* @var $this yii\web\View */
/* @var $model app\models\Program */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="program-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tahun_acara')->textInput() ?>
    <!-- bikin input type hidden untuk menyimpan peserta yang mendaftar pada pelatihan tersebut.  -->
    <div id="peserta">

    </div>
    <?php

    Modal::begin([
	    'title' => 'Tambah Peserta Pelatihan',
	    'toggleButton' => ['label' => 'Tambah Peserta', 'class'=>'btn btn-info'],
	]);
    echo "<table width='100%' cellpadding=5>
    		<tr><td>Nama Usaha</td><td>Action</td></tr>";
   	foreach($usaha as $row){
   		echo "<tr><td>" . $row['nama_usaha'] . "</td><td class='baris-". $row['id'] . "'>";
   		echo ($row['jumlah']==0)?"<a href='#' class='btn btn-info' onclick='add(" . $row['id'] . ",\"" . $row['nama_usaha'] . "\")'>Tambah</a>":"";
   		echo "</td></tr>";
   	}
   	echo "</table>";
	//echo 'Say hello...';

	Modal::end();
    ?>
    <br />
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<script>
	function add(id,nama){
		$("#peserta").append("<span class=\"badge badge-primary\">"+nama+" <span onclick='del("+id+")'>x</span></span><input type='hidden' name='peserta[]' value='"+id+"'>");
		$(".baris-"+id).html("<span class='btn btn-success'>Ditambahkan</span>");
	}
</script>
