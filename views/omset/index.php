<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OmsetSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Omsets';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="omset-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Omset', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'usaha_id',
            'omset',
            'penjualan',
            'bulan',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
