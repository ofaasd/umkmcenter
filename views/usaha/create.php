<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Usaha */

$this->title = 'Buat Usaha Baru';
$this->params['breadcrumbs'][] = ['label' => 'Usahas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usaha-create">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
        'izin' => $izin,
        'pemilik' => $pemilik,
    ]) ?>

</div>
