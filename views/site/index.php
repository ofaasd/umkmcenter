<?php
use yii\helpers\Url;
use yii\helpers\Json;
use rmrevin\yii\fontawesome\FAS;
use dosamigos\chartjs\ChartJs;

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
$bulan = array("Jan","Feb","Mar","Apr","Mei","Jun","Jul","Agu","Sep","Okt","Nop","Des");
$jumlah = array();
foreach($grafik as $row){
    $jumlah[] = (int)$row['jumlah_bulan'];
}
$jumlah_wilayah = array();
$kota = array();
foreach($pie as $row){
    $jumlah_wilayah[] = $row['jumlah_wilayah'];
    $kota[] = $row['nama_kota'];
}
//echo implode(",",$jumlah);
?>
<style>
    .my-card{
        padding:20px;
        height:120px;
        color:#fff;
    }
    .my-card h1{
        font-size:45pt;
        color:#fff;
        display:block;
        margin-right:20px;
        float:left;
    }
    .my-card p{
        display:block;
        float:left;
        font-size:15pt;
        margin:0;
    }
</style>
<div class="site-index">
<div class="row">
    <div class="col-sm-3">
        <div class="col-sm-12 cards my-card" style="background:#1abc9c;border-bottom:8px solid #16a085">
            <h1><?= FAS::icon("dollar-sign");?></h1>
            <small>Total Omset</small><br />
            <p><b><?= number_format($omset,0,",",".") ?></b></p><br />
            <!-- <small>Semua RKB</small> -->
        </div>
    </div>
    <div class="col-sm-3">
        <div class="col-sm-12 cards my-card" style="background:#3498db;border-bottom:8px solid #2980b9">
            <h1><?= FAS::icon("store");?></h1>
            <small>Total UMKM</small><br />
            <p><b><?= $umkm ?></b></p><br />
            <!-- <small>Semua RKB</small> -->
        </div>
    </div>
    <div class="col-sm-3">
        <div class="col-sm-12 cards my-card" style="background:#e67e22;border-bottom:8px solid #d35400">
            <h1><?= FAS::icon("user-tie");?></h1>
            <small>Total Mentor</small><br />
            <p><b><?= $mentor ?></b></p><br />
            <!-- <small>Semua RKB</small> -->
        </div>
    </div>
    <div class="col-sm-3">
        <div class="col-sm-12 cards my-card" style="background:#9b59b6;border-bottom:8px solid #8e44ad">
            <h1><?= FAS::icon("chart-line");?></h1>
            <small>Total Pelatihan</small><br />
            <p><b><?= $program ?></b></p><br />
            <!-- <small>Semua RKB</small> -->
        </div>
    </div>
</div><br /><br /> 
<div class="row">
    <div class="col-md-8">
        <p style="margin-left:15px;color:#3498db;margin-bottom:5px;"><b>Grafik Omset</b></p> 
    </div>
    <div class="col-md-4">
        <p style="margin-left:15px;color:#3498db;margin-bottom:5px;"><b>UMKM Terdaftar</b></p> 
    </div>
</div>
<div class="row">    
    <div class="col-md-8">
        <div class="col-md-12" style="background:#fff">
            <?= ChartJs::widget([
                'type' => 'bar',
                'options' => [
                    'height' => 100,
                    'width' => 190,
                
                ],
                'clientOptions'=>[
                    'scales' => [
                        'xAxes' => [
                            [
                              'barPercentage' => "0.4",   
                            ]
                        ],
                    ],
                    'legends'=>[
                        'display' => "none",
                    ]
                ],
                'data' => [

                    'labels' => $bulan,
                    'datasets' => [
                        [
                            'label' => "My First dataset",
                            'backgroundColor' => "#3498db",
                            'borderColor' => "#2980b9",
                            'border-width' => 1,
                            'pointBackgroundColor' => "rgba(179,181,198,1)",
                            'pointBorderColor' => "#fff",
                            'pointHoverBackgroundColor' => "#fff",
                            'pointHoverBorderColor' => "rgba(179,181,198,1)",
                            'data' => $jumlah
                        ],]

                                    ]
            ]);
            ?>
        </div>  
    </div>
    <div class="col-md-4">
        <div class="col-md-12" style="background:#fff">
            <?= ChartJs::widget([
                'type' => 'pie',
                'options' => [
                    'height' => 100,
                    'width' => 100,
                
                ],
                'clientOptions'=>[
                    'legends'=>[
                        'display' => "none",
                    ]
                ],
                'data' => [

                    'labels' => $kota,
                    'datasets' => [
                        [                            
                            'data' => $jumlah_wilayah,
                            'backgroundColor' => [
                                "#3498db",
                                "#2ecc71",
                                "#9b59b6",
                                "#e74c3c",
                            ],
                        ],
                    ]
                ]
            ]);
            ?>
        </div>
    </div>
</div>
   <!--  <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/forum/">Yii Forum &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>
            </div>
        </div>

    </div> -->
</div>
