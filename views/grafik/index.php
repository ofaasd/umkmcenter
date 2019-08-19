<?php

use yii\helpers\Html;
use yii\grid\GridView;
use dosamigos\chartjs\ChartJs;
$bulan = array(1=>"Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","Nopember","Desember");
/* @var $this yii\web\View */
/* @var $searchModel app\models\UsahaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Usahas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="grafik-index">
	<form>
		<div class="form-group">
			<select class="form-control">
				<option value="0"> -- Pilih Nama Usaha -- </option> 
				<?php
					foreach($usaha as $row){
						echo "<option value='" . $row['id'] . "'>" . $row['nama_usaha'] . "</option>";
					}
				?>
			</select>
		</div>
		<div class="form-group">
			<div class="form-row">
				<div class="col">
					<select class="form-control">
						<option value="0">Bulan</option>
						<?php
							foreach($bulan as $key=>$value){
								echo "<option value='" . $key . "'>" . $value . "</option>";
							}
						?>
					</select>
				</div>
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
			<?= ChartJs::widget([
			    'type' => 'line',
			    'options' => [
			        'height' => 150,
			        'width' => 400
			    ],
			    'data' => [
			        'labels' => ["January", "February", "March", "April", "May", "June", "July"],
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
			                'data' => [65, 59, 90, 81, 56, 55, 40]
			            ],
			        ]
			    ]
			]);
			?>
		</div>
	</div>
</div>