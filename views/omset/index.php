<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use app\helpers\Helpers;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OmsetSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Omsets';
$this->params['breadcrumbs'][] = $this->title;
$bulan = array(1=>"Jan","Feb","Mar","Apr","Mei","Jun","Jul","Agu","Sep","Okt","Nop","Des");
?>
<div class="omset-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Omset', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <div class="form-group">
        <label for="tahun">Tahun : </label>
        <input type="number" value='<?= date('Y')?>' class="form-control" id="tahun_omset">
    </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <table class="table">
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
                    echo "<td><a href='#' onclick='add_omset(" . $row['id'] .",". $key.")'>" . Helpers::getOmset($row['id'],$key,2019) . "</a></td>";
                }
                echo "</tr>";
            }?>
        </tbody>
    </table>


</div>

<script>

    function add_omset(usaha_id,bulan){
        var tahun = $("#tahun_omset").val();
        window.location.href = "<?= Url::to(['omset/addomset']);?>?usaha_id="+usaha_id+"&bulan="+bulan+"&tahun="+tahun;
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