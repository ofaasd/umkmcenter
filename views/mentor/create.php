<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Mentor */

$this->title = 'Buat Mentor';
$this->params['breadcrumbs'][] = ['label' => 'Mentors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="mentor-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
