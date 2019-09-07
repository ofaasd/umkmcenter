<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap4\Modal;


/* @var $this yii\web\View */
/* @var $model app\models\Program */

$this->title = 'Data Peserta Pelatihan';
$this->params['breadcrumbs'][] = ['label' => 'Programs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
	#peserta .badge{
		margin-right:10px;
	}
</style>
<div class="program-view">
	<h2><?= $this->title; ?></h2>
	<table class="tbl tbl-stripped">
		<thead>
			<tr>
				<th>Nama</th>
				<th>Email</th>
			</tr>
		</thead>
		<tbody>
			<?php
			foreach($usaha as $row){
				echo "<tr><td>" . $row['nama_usaha'] . "</td><td>" . $row['email'] . "</td></tr>";
			}
			?>
		</tbody>
	</table>
</div>