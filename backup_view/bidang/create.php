<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Bidang */

$this->title = 'Buat Bidang Usaha';
$this->params['breadcrumbs'][] = ['label' => 'Bidangs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bidang-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
