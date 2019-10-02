<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\IzinSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="izin-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'akte_notaris') ?>

    <?= $form->field($model, 'badan_hukum') ?>

    <?= $form->field($model, 'siup') ?>

    <?= $form->field($model, 'npwp') ?>

    <?php // echo $form->field($model, 'tdp') ?>

    <?php // echo $form->field($model, 'lain') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-info']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
