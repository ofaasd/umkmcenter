<?php

use yii\helpers\Html;
use app\helpers\Helpers;
use yii\grid\GridView;
use dosamigos\chartjs\ChartJs;
$bulan = array(1=>"Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","Nopember","Desember");
/* @var $this yii\web\View */
/* @var $searchModel app\models\UsahaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Usahas';
$this->params['breadcrumbs'][] = $this->title;
?>
<h1>Grafik Index Omset Perusahaan</h1>
<div class="grafik-index">
	<form method="POST" action="">
		<div class="form-group">
			<select class="form-control" name="usaha_id">
				<option value="0"> -- Pilih Nama Usaha -- </option> 
				<?php
					foreach($usaha as $row){
						echo "<option value='" . $row['id'] . "' ";
						if($row['id']==$usaha_id){
							echo "selected";
						}

						echo ">" . $row['nama_usaha'] . "</option>";
					}
				?>
			</select>
		</div>
		<div class="form-group">
			<div class="form-row">
				<div class="col">
					<input type="number" name="tahun" class="form-control" value="<?= (isset($tahun))?$tahun:date('Y'); ?>">
				</div>
			</div>
		</div>
		<div class="form-group">
			<input type="submit" value="lihat" class="form-control btn btn-info" >
		</div>
	</form>
	<div class="row">
		<div class="col-md-12">
			<?php
			if(Yii::$app->request->post()){
				$hasil = [];
				foreach($bulan as $key=>$value){
					$hasil[$key-1] = Helpers::getOmset($usaha_id,$key,$tahun);
				}
				//var_dump([10,10,10,10,10,10,10,10,10,10,10,10]);
			?>
				<?= ChartJs::widget([
				    'type' => 'line',
				    'options' => [
				        'height' => 150,
				        'width' => 400
				    ],
				    'data' => [
				        'labels' => ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","Nopember","Desember"],
				        'datasets' => [
				            [
				                'label' => "My First dataset", //judul grafik
				                'backgroundColor' => "rgba(179,181,198,0.2)",
				                'pointRadius'=>6,
				                'borderColor' => "rgba(179,181,198,1)",
				                'pointBackgroundColor' => "rgba(179,181,198,1)",
				                'pointBorderColor' => "#fff",
				                'pointHoverBackgroundColor' => "#fff",
				                'pointHoverBorderColor' => "rgba(179,181,198,1)",
				                'data' => $hasil
				            ],
				        ]
				    ]
				]);
				?>
			<?php
			}
			?>
		</div>
	</div>
</div>