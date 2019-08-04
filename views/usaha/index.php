<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsahaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Usahas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usaha-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Usaha', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'program_id',
            'kategori_id',
            'pemilik_id',
            'nama',
            //'tahun_berdiri',
            //'alamat:ntext',
            //'notelp',
            //'email:email',
            //'website',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
