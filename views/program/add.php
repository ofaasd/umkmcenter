<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap4\Modal;


/* @var $this yii\web\View */
/* @var $model app\models\Program */

$this->title = 'Create Program';
$this->params['breadcrumbs'][] = ['label' => 'Programs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
	#peserta .badge{
		margin-right:10px;
	}
</style>
<div class="program-create">

    <h1><?= Html::encode($this->title) ?> Pelatihan</h1>

    <table class="" cellpadding="10">
    	<tr>
    		<td><b>Nama</b></td><td>: <?= $model->nama?></td>
    	</tr>
    	<tr>
    		<td><b>Tahun Acara</b></td><td>: <?=$model->tahun_acara?></td>
    	</tr>
    </table>
    <div id="peserta">
    	<?php
    		foreach($usaha as $row){
    			if($row['jumlah'] > 0){
    				echo "<span class=\"badge badge-info peserta-".$row['usaha_id']."\">".$row['nama_usaha']." <span onclick='del(".$row['usaha_id'].",\"".$row['nama_usaha']."\")'>x</span></span><input type='hidden' class=\"peserta-".$row['usaha_id']."\" name='peserta[]' value='".$row['usaha_id']."'>";
    			}
    		}
    	?>
    </div>
    <?php
    if(isset($usaha)){
        Modal::begin([
    	    'title' => 'Tambah Peserta Pelatihan',
    	    'toggleButton' => ['label' => 'Tambah Peserta', 'class'=>'btn btn-info','style'=>'margin:10px 0;'],

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
    }
    ?>


</div>
<script>
	function add(id,nama){
		
		$.ajax({
			url : "<?= Url::to(['program/adddb']);?>",
			method : "POST",
			data : "usaha_id="+id+"&program_id=<?= $id ?>",
			success:function(data){
				$("#peserta").append("<span class=\"badge badge-info peserta-"+id+"\">"+nama+" <span onclick='del("+id+",\""+nama+"\")'>x</span></span><input type='hidden' class=\"peserta-"+id+"\" name='peserta[]' value='"+id+"'>");
				$(".baris-"+id).html("<span class='btn btn-success'>Ditambahkan</span>");
			},
		});
	}
  function del(id,nama){
  	$.ajax({
			url : "<?= Url::to(['program/deldb']);?>",
			method : "POST",
			data : "usaha_id="+id+"&program_id=<?= $id ?>",
			success:function(data){
				 $(".peserta-"+id).remove();
				$(".baris-"+id).html("<a href='#' class='btn btn-info' onclick='add("+id+",\""+nama+"\")'>Tambah</a>");
			},
		});
   
  }
</script>