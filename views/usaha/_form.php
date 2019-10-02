<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Bidang;
use app\models\Kategori;
use app\models\Mentor;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\models\Usaha */
/* @var $izin app\models\Izin */
/* @var $pemilik app\models\Pemilik */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usaha-form">
    <h2>Profile Pemilik Usaha</h2>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($pemilik, 'nama', [
    "template" => "<label> Nama Pemilik </label>\n{input}\n{hint}\n{error}"
    ])->textInput(['maxlength' => true]) ?>

    <?= $form->field($pemilik, 'alamat')->textarea(['rows' => 6]) ?>

    <?= $form->field($pemilik, 'notelp')->textInput(['maxlength' => true]) ?>

    <h2>Profil Usaha</h2>

    <!--  -->
    
    <!-- <?= $form->field($model, 'bidang_id')->textInput() ?> -->

    <!-- <?= $form->field($model, 'mentor_id')->textInput() ?> -->
    
    <?= $form->field($model, 'nama_usaha')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tahun_berdiri')->textInput() ?>

    <?= $form->field($model, 'alamat_usaha')->textarea(['rows' => 6]) ?>
    
    <label>Bidang Usaha</label> / <a href="<?= Url::toRoute(['bidang/create'])?>">Buat Bidang baru</a>
    <?php
        $bidang = ArrayHelper::map(Bidang::find()->all(),'id','nama');
        echo Html::activeDropDownList($model, 'bidang_id',$bidang,['class'=>'form-control']); 
    ?>


    <?= $form->field($model, 'notelp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'website')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kredit_bank',[
    "template" => "<label> Besarnya Kredit Bank <small>(masukan 0 jika tidak ada kredit bank)</small></label>\n{input}\n{hint}\n{error}"
    ])->textInput() ?>

    <?= $form->field($model, 'tenaga_kerja')->textInput() ?>

    <label>Mentor</label>
    <?php
        $mentor = ArrayHelper::map(Mentor::find()->all(),'id','nama');
        echo Html::activeDropDownList($model, 'mentor_id',$mentor,['class'=>'form-control']); 
    ?>

    <h2>Izin Usaha</h2>

    <?= $form->field($izin, 'akte_notaris')->textInput(['maxlength' => true]) ?>

    <?= $form->field($izin, 'badan_hukum')->textInput(['maxlength' => true]) ?>

    <?= $form->field($izin, 'siup')->textInput(['maxlength' => true]) ?>

    <?= $form->field($izin, 'npwp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($izin, 'tdp')->textInput(['maxlength' => true]) ?>

    <?= $form->field($izin, 'lain')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-info']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
