<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use rmrevin\yii\fontawesome\FAS;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head> 
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<nav class="side-navbar">
      <div class="side-navbar-wrapper">
        <!-- Sidebar Header    -->
        <div class="sidenav-header d-flex align-items-center justify-content-center">
          <!-- User Info-->
          <div class="sidenav-header-inner text-center"><img src="<?= Url::base(); ?>/asset/img/avatar-2.jpg" alt="person" class="img-fluid rounded-circle">
            <h2 class="h5">Hi! </h2><span>Admin</span>
          </div>
          <!-- Small Brand information, appears on minimized sidebar-->
          <div class="sidenav-header-logo"><a href="index.html" class="brand-small text-center"> <strong>B</strong><strong class="text-primary">D</strong></a></div>
        </div>
        <!-- Sidebar Navigation Menus-->
        <div class="main-menu">
          <h5 class="sidenav-heading">Main</h5>
          <ul id="side-main-menu" class="side-menu list-unstyled">                  
            <li><a href="<?= Url::toRoute(['site/index']);?>"><?= FAS::icon('home');?> Home</a></li>
            <!-- <li><a href="<?= Url::toRoute(['pemilik/index']);?>"><?= FAS::icon('user-tie');?> Pemilik</a></li> -->
            <li><a href="<?= Url::toRoute(['program/index']);?>"><?= FAS::icon('layer-group');?>Data Pelatihan</a></li>
            <li><a href="<?= Url::toRoute(['mentor/index']);?>"><?= FAS::icon('user-tie');?> Data Mentor</a></li>
            <li><a href="<?= Url::toRoute(['bidang/index']);?>"><?= FAS::icon('tags');?> Bidang Usaha</a></li>
            <li><a href="<?= Url::toRoute(['usaha/index']);?>"><?= FAS::icon('hotel');?> Profil UMKM</a></li>
            <li><a href="<?= Url::toRoute(['omset/index']);?>"><?= FAS::icon('money-check-alt');?> Omset</a></li>
            <li><a href="<?= Url::toRoute(['grafik/index']);?>"><?= FAS::icon('chart-line');?> Grafik</a></li>


        </div>
      </div>
    </nav>
    <div class="page">
      <!-- navbar-->
      <header class="header">
        <nav class="navbar">
          <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
              <div class="navbar-header"><a id="toggle-btn" href="#" class="menu-btn"><?= FAS::icon('bars'); ?></a><a href="index.html" class="navbar-brand">
                  <div class="brand-text d-none d-md-inline-block"><span></span> <strong class="text-primary">Smart-Incubator UMKM</strong></div></a></div>
              <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                <!-- Log out-->
                  <?php
                    if (!empty(Yii::$app->user) && !Yii::$app->user->can("admin")) {
                  ?>      
                <?= Html::a('login ', Url::to(['/user/login'])) ?>
                <?php
                      }else{
                ?>
                    <?= Html::a('logout ' . Yii::$app->user->displayName, Url::to(['/user/logout']), ['data-method' => 'POST']) ?>
                  
                <?php
                      }
                ?>
              </ul>
            </div>
          </div>
        </nav>
      </header>
      <!-- Counts Section -->
      <section class="dashboard-counts section-padding">
        <div class="container-fluid">
          <?= $content ?>
        </div>
      </section>
      <footer class="main-footer">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-6">
              <p>Your company &copy; 2017-2019</p>
            </div>
            <div class="col-sm-6 text-right">
              <p>Design by <a href="https://bootstrapious.com/p/bootstrap-4-dashboard" class="external">Bootstrapious</a></p>
              <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions and it helps me to run Bootstrapious. Thank you for understanding :)-->
            </div>
          </div>
        </div>
      </footer>
    </div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
