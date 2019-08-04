<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Pemilik */

$this->title = 'Create Pemilik';
$this->params['breadcrumbs'][] = ['label' => 'Pemiliks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pemilik-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
