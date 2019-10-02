<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Izin */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="izin-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'akte_notaris')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'badan_hukum')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'siup')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'npwp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tdp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lain')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-info']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
