<?php

use yii\helpers\Html;
use yii\grid\GridView;
use rmrevin\yii\fontawesome\FAS;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProgramSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Programs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="program-index">

    <h1><?= Html::encode($this->title) ?> Pelatihan</h1>

    <p>
        <?= Html::a('Create Program', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'nama',
            'tahun_acara',

            ['class' => 'yii\grid\ActionColumn',
                'template' => '{add}{update}{delete}{addview}',
                'buttons'=>[
                    'add' => function ($url, $model, $key) {
                        return Html::a(FAS::icon('user-plus'), ['add', 'id'=>$model->id],['title'=>'Tambah Peserta']);
                    },
                    'addview' => function ($url, $model, $key) {
                        return Html::a(FAS::icon('user'), ['viewusaha', 'id'=>$model->id],['title'=>'Lihat Peserta']);
                    },
                ],
            ],
        ],
    ]); ?>


</div>
