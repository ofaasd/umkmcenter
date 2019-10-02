<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
/**
 * @var yii\web\View $this
 * @var yii\widgets\ActiveForm $form
 * @var app\modules\user\models\forms\LoginForm $model
 */

$this->title = Yii::t('user', 'Login');
$this->params['breadcrumbs'][] = $this->title;
?>
<center>
<div class="user-default-login">
    <div class="form-outer text-center align-items-center">


        <div class="form-inner">
              <img src="<?= Url::base(); ?>/asset/img/logorkb2.jpg" width="200" style="margin-bottom:30px;">
              <hr/>
            <h1><?= Html::encode($this->title) ?></h1>

            <?php $form = ActiveForm::begin([
                'id' => 'login-form',
                'options' => ['class' => 'form-horizontal'],
                'fieldConfig' => [
                    'template' => "{label}\n<div class=\"col-lg-12\">{input}</div>\n<div class=\"col-lg-12\">{error}</div>",
                    'labelOptions' => ['class' => 'col-lg-12 control-label'],
                ],

            ]); ?>

            <?= $form->field($model, 'email') ?>
            <?= $form->field($model, 'password')->passwordInput() ?>
            <?= $form->field($model, 'rememberMe', [
                'template' => "{label}<div class=\" col-lg-12\">{input}</div>\n<div class=\"col-lg-12\">{error}</div>",
            ])->checkbox() ?>

            <div class="form-group">
                <div class=" col-lg-12">
                    <?= Html::submitButton(Yii::t('user', 'Login'), ['class' => 'btn btn-info']) ?>

                    <br/><br/>
                    <?= Html::a(Yii::t("user", "Forgot password") . "?", ["/user/forgot"]) ?> 
                </div>
            </div>

            <?php ActiveForm::end(); ?>

            <?php if (Yii::$app->get("authClientCollection", false)): ?>
                <div class="col-lg-offset-2 col-lg-10">
                    <?= yii\authclient\widgets\AuthChoice::widget([
                        'baseAuthUrl' => ['/user/auth/login']
                    ]) ?>
                </div>
            <?php endif; ?>

            <div class="col-lg-offset-2" style="color:#999;">
               
            </div>
        </div>
    </div>

</div>
</center>
