<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Usaha */

$this->title = 'Ubah Usaha: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Usahas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="usaha-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'izin' => $izin,
        'pemilik' => $pemilik,
    ]) ?>

</div>
