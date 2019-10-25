<?php

use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Omset */

$this->title = 'Buat Omset';
$this->params['breadcrumbs'][] = ['label' => 'Omsets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="omset-create">

    <h1><?= Html::encode($this->title) ?></h1> 
    <?php
    	if(!empty($_GET['id'])){
    ?>
    	<a href="<?= Url::to(["omset/import","id"=>$_GET['id']]) ?>" class="btn btn-primary">Import Data </a>
    <?php
	}
    ?>	

    <?= $this->render('_form', [
        'model' => $model,
        'usaha'=>$usaha,
        'bulan'=>(empty($bulan))?"":$bulan,
    ]) ?>

</div>
