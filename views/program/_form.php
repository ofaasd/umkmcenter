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
    if(isset($usaha)){
        Modal::begin([
    	    'title' => 'Tambah Peserta Pelatihan',
    	    'toggleButton' => ['label' => 'Tambah Peserta', 'class'=>'btn btn-warning','style'=>'margin:10px 0;'],

    	]);
        echo "<table width='100%' cellpadding=5>
        		<tr><td>Nama Usaha</td><td>Action</td></tr>";
       	foreach($usaha as $row){
       		echo "<tr><td>" . $row['nama_usaha'] . "</td><td class='baris-". $row['id'] . "'>";
       		echo ($row['jumlah']==0)?"<a href='#' class='btn btn-warning' onclick='add(" . $row['id'] . ",\"" . $row['nama_usaha'] . "\")'>Tambah</a>":"";
       		echo "</td></tr>";
       	}
       	echo "</table>";
    	//echo 'Say hello...';

    	Modal::end();
    }
    ?>
    
    <div class="form-group" style="display:block; margin:10px 0;">
        <?= Html::submitButton('Save', ['class' => 'btn btn-info']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<script>
	function add(id,nama){
		$("#peserta").append("<span class=\"badge badge-info peserta-"+id+"\">"+nama+" <span onclick='del("+id+",\""+nama+"\")'>x</span></span><input type='hidden' class=\"peserta-"+id+"\" name='peserta[]' value='"+id+"'>");
		$(".baris-"+id).html("<span class='btn btn-success'>Ditambahkan</span>");
	}
  function del(id,nama){
    $(".peserta-"+id).remove();
    $(".baris-"+id).html("<a href='#' class='btn btn-warning' onclick='add("+id+",\""+nama+"\")'>Tambah</a>");
  }
</script>
