<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\user\models\UserPhoto */

$this->title = 'Create User Photo';
$this->params['breadcrumbs'][] = ['label' => 'User Photos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-photo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
