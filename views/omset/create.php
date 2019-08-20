<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Omset */

$this->title = 'Create Omset';
$this->params['breadcrumbs'][] = ['label' => 'Omsets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="omset-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'usaha'=>$usaha,
        'bulan'=>(empty($bulan))?"":$bulan,
    ]) ?>

</div>
