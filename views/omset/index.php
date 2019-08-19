<?php

use yii\helpers\Html;
use yii\grid\GridView;

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
        <input type="number" value='<?= date('Y')?>' class="form-control">
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
                echo "<tr><td style='font-size:9pt;'>" . $row['nama_usaha'] . "</td>";
                foreach($bulan as $value){
                    echo "<td contenteditable='true'>0</td>";
                }
                echo "</tr>";
            }?>
        </tbody>
    </table>


</div>
