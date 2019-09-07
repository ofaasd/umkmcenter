<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Usaha */

$this->title = "Usaha Berhasil Ditambahkan";
$this->params['breadcrumbs'][] = ['label' => 'Usahas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="usaha-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'pemilik_id',
            'bidang_id',
            'izin_id',
            'mentor_id',
            'nama_usaha',
            'tahun_berdiri',
            'alamat_usaha:ntext',
            'notelp',
            'email:email',
            'website',
            'kredit_bank',
            'tenaga_kerja',
        ],
    ]) ?>

</div>
