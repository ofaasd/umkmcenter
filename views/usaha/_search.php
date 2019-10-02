<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UsahaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usaha-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'pemilik_id') ?>

    <?= $form->field($model, 'bidang_id') ?>

    <?= $form->field($model, 'izin_id') ?>

    <?= $form->field($model, 'mentor_id') ?>

    <?php // echo $form->field($model, 'nama_usaha') ?>

    <?php // echo $form->field($model, 'tahun_berdiri') ?>

    <?php // echo $form->field($model, 'alamat_usaha') ?>

    <?php // echo $form->field($model, 'notelp') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'website') ?>

    <?php // echo $form->field($model, 'kredit_bank') ?>

    <?php // echo $form->field($model, 'tenaga_kerja') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-info']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
