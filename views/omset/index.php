<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use app\helpers\Helpers;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OmsetSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Daftar Omset UMKM';
$this->params['breadcrumbs'][] = $this->title;
$bulan = array(1=>"Jan","Feb","Mar","Apr","Mei","Jun","Jul","Agu","Sep","Okt","Nop","Des");
?>
<style>
    .table .thead-dark th{
        background:#2980b9 ;
    }
    table{
        font-size:0.75em;
    }
</style>
<div class="omset-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Omset', ['create'], ['class' => 'btn btn-info']) ?>
    </p>
    <div class="form-group">
        <label for="tahun">Tahun : </label>
        <input type="number" value='<?= date('Y')?>' class="form-control" id="tahun_omset">
    </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <table class="table" width="100%">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Nama</th>
                <?php
                foreach($bulan as $value){
                    echo "<th align='center' scope='col'>" . $value . "</th>";
                }
                ?>  
            </tr>
        </thead>
        <tbody>
            <?php foreach($model as $row){
                echo "<tr><td style='font-size:9pt;'> <a href='" . Url::to(['omset/createomset',"id"=>$row['id']]) . "'>" . $row['nama_usaha'] . "</a></td>";
                foreach($bulan as $key=>$value){
                    $omset = array();
                    $omset = Helpers::getOmset($row['id'],$key,2019);
//echo var_dump($omset);
                    $id = "";
                    $jmlomset = "0";
                    foreach($omset as $k=>$v){
                        $id = $k;
                        $jmlomset = $v;
                    }
                   // echo $jmlomset;
                    if($jmlomset == 0){
                        echo "<td><a href='#' onclick='add_omset(" . $row['id'] .",". $key."," . $id  . ")'>" . $jmlomset . "</a></td>";
                    }else{
                         echo "<td><a href='#' onclick='add_omset(" . $row['id'] .",". $key.",". $id.")'>" . $jmlomset . "</a></td>";
                    }

                    
                }
                echo "</tr>";
            }?>
        </tbody>
    </table>


</div>

<script>

    function add_omset(usaha_id,bulan,id){
        var tahun = $("#tahun_omset").val();
        window.location.href = "<?= Url::to(['omset/addomset']);?>?usaha_id="+usaha_id+"&bulan="+bulan+"&tahun="+tahun+"&id="+id;
        // $.ajax({
        //     url : "<?= Url::to(['omset/addomset']);?>",
        //     method : "POST",
        //     data : "usaha_id="+usaha_id+"&bulan="+bulan+"&tahun="+tahun,
        //     success:function(data){
        //         $("#peserta").append("<span class=\"badge badge-info peserta-"+id+"\">"+nama+" <span onclick='del("+id+",\""+nama+"\")'>x</span></span><input type='hidden' class=\"peserta-"+id+"\" name='peserta[]' value='"+id+"'>");
        //         $(".baris-"+id).html("<span class='btn btn-success'>Ditambahkan</span>");
        //     },
        // });
    }
</script>