<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsahaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Data Profil UMKM';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usaha-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Daftar Baru', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'pemilik_id',
            //'bidang_id',
            //'izin_id',
            [
                'header'=>'Nama pemilik',
                'value'=>'pemilik.nama',
            ],
            
            'nama_usaha',
            'tahun_berdiri',
            'alamat_usaha:ntext',
            //'notelp',
            'email:email',
            'website',
            //'kredit_bank',
            //'tenaga_kerja',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
