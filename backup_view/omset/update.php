<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Omset */

$this->title = 'Ubah Omset Omset: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Omsets', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="omset-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'usaha'=>$usaha,
        //'tahun'=>$tahun,
    ]) ?>

</div>
