<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\modules\user\helpers\Timezone;
use kartik\file\FileInput;
use yii\bootstrap4\Modal;
use app\helpers\Helpers;
use rmrevin\yii\fontawesome\FAS;
use yii\web\view;

/**
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var app\modules\user\models\Profile $profile
 */

$this->title = Yii::t('user', 'Profile');
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    .pp img{
        width:300px;
    }
</style>
<div class="user-default-profile">
    <div class="col-md-12">
    <h1><?= Html::encode($this->title) ?></h1>
    </div>
    <?php if ($flash = Yii::$app->session->getFlash("Profile-success")): ?>

        <div class="alert alert-success">
            <p><?= $flash ?></p>
        </div>
    
    <?php endif;?>
    <div class="col-md-2">
        <div class="pp">
            <?php
                echo newerton\fancybox3\FancyBox::widget();
                $image = Helpers::getUserPhoto(Yii::$app->user->id);
                if(empty($image)){
                
                echo yii\helpers\Html::a(yii\helpers\Html::img(Url::base() . '/asset/img/no-profile.png'), Url::base() . '/asset/img/no-profile.png', ['data-fancybox' => true]);
            ?>
                
                     <!-- <img src="<?= Url::base(); ?>/asset/img/no-profile.png" width="100" style="margin:10px 0;"> -->
                 
            <?php
                }else{
                    $gambar = Helpers::getuserPhoto(Yii::$app->user->id);
                    
                    echo yii\helpers\Html::a(yii\helpers\Html::img(Url::base() . "/asset/upload/profile/" . $gambar['file']), Url::base() . "/asset/upload/profile/" . $gambar['file'], ['data-fancybox' => true]);
                    //echo "<img src='" . Url::base() . "/asset/upload/profile/" . $gambar['file'] . "' width='100'>" ;
                }
            ?>
        </div>
    </div>
    <?php $form = ActiveForm::begin([
        'id' => 'profile-form',
        'options' => ['class' => 'form-horizontal'],
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-9\">{input}</div>\n<div class=\"col-lg-3\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-12 control-label'],
        ],
        'enableAjaxValidation' => true,
    ]); ?>
    <div class="col-md-6">

        <?php
            Modal::begin([
                'id'=>'myModal',
                'title'=>'Upload Photo',
                'toggleButton' => [
                    'label'=>'Ganti Photo', 'class'=>'btn btn-default'
                ],
            ]);
            $form1 = ActiveForm::begin([
                'options'=>['enctype'=>'multipart/form-data'],
                
            ]);
            echo FileInput::widget(
                [
                    'name'=>'image',
                    'pluginOptions' => [
                        'uploadUrl' => Url::to(['/userphoto/upload']),
                        'maxFileCount' => 1
                    ]
                ]
                );
            ActiveForm::end();
            Modal::end();
        ?>
    </div>
    <?= $form->field($profile, 'full_name') ?>

    <?php
    // by default, this contains the entire php timezone list of 400+ entries
    // so you may want to set up a fancy jquery select plugin for this, eg, select2 or chosen
    // alternatively, you could use your own filtered list
    // a good example is twitter's timezone choices, which contains ~143  entries
    // @link https://twitter.com/settings/account

    ?>
    <!-- <?= $form->field($profile, 'timezone')->dropDownList(ArrayHelper::map(Timezone::getAll(), 'identifier', 'name')); ?> -->


    <div class="form-group">
        <div class="col-lg-offset-2 col-lg-10">
            <?= Html::submitButton(Yii::t('user', 'Update'), ['class' => 'btn btn-primary']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php
    $script = "
    $('#myModal').on('hide.bs.modal', function (e) {
        $.get(\"" . Url::to(['/userphoto/refresh']) . "\",function(data){
            $(\".pp\").html(data);
        });
    });";
$this->registerJS($script, View::POS_END);
?>