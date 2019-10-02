<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\IzinSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Izins';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="izin-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Izin', ['create'], ['class' => 'btn btn-info']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'akte_notaris',
            'badan_hukum',
            'siup',
            'npwp',
            //'tdp',
            //'lain',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
