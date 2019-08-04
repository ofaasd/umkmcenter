<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Omset */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="omset-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'usaha_id')->textInput() ?>

    <?= $form->field($model, 'omset')->textInput() ?>

    <?= $form->field($model, 'penjualan')->textInput() ?>

    <?= $form->field($model, 'bulan')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
