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
    <style>
      .background-putih{
        background:#ecf0f1;color:#2980b9;
      }
      .side-navbar li a{
        color:#34495e;
      }
      .side-navbar li a:focus, .side-navbar li a:hover, .side-navbar li a[aria-expanded="true"], .side-navbar li a.active{
        background: #3498db;
        color: #fff;
        text-decoration: none;
      }
      a,nav.navbar a{
        color:#3498db;
      }
      footer.main-footer{
        background:#bdc3c7;
      }
    </style>  
</head>
<body>
<?php $this->beginBody() ?>

<nav class="side-navbar background-putih">
      <div class="side-navbar-wrapper">
        <!-- Sidebar Header    -->
        <div class="sidenav-header d-flex align-items-center justify-content-center background-putih" style="background:#bdc3c7;color:#2980b9;">
          <!-- User Info-->
          <div class="sidenav-header-inner text-center"><img src="<?= Url::base(); ?>/asset/img/avatar-2.jpg" alt="person" class="img-fluid rounded-circle">
            <h2 class="h5">Hi! </h2><span>Admin</span>
          </div>
          <!-- Small Brand information, appears on minimized sidebar-->
          <div class="sidenav-header-logo"><a href="index.html" class="brand-small text-center"> <strong>BRI</strong></a></div>
        </div>
        <!-- Sidebar Navigation Menus-->
        <div class="main-menu">
          <h5 class="sidenav-heading">Main</h5>
          
          <ul id="side-main-menu" class="side-menu list-unstyled">                  
            <li><a href="<?= Url::base() . "/site/index";?>" <?= (Yii::$app->controller->id=="site")?'class="active"':"";?>><?= FAS::icon('home');?> Home</a></li>
            <!-- <li><a href="<?= Url::toRoute(['pemilik/index']);?>"><?= FAS::icon('user-tie');?> Pemilik</a></li> -->
            <li><a href="<?= Url::base() . "/program/index";?>"<?= (Yii::$app->controller->id=="program")?'class="active"':"";?>><?= FAS::icon('layer-group');?>Data Pelatihan</a></li>
            <li><a href="<?= Url::base() . "/mentor/index";?>" <?= (Yii::$app->controller->id=="mentor")?'class="active"':"";?>><?= FAS::icon('user-tie');?> Data Mentor</a></li>
            <?php
              if (!empty(Yii::$app->user) && Yii::$app->user->can("admin")){

            ?>
            <li><a href="<?= Url::base() . "/bidang/index";?>" <?= (Yii::$app->controller->id=="bidang")?'class="active"':"";?>><?= FAS::icon('tags');?> Bidang Usaha</a></li>
            <?php
              }
            ?>

            <li><a href="<?= Url::base() . "/usaha/index";?>" <?= (Yii::$app->controller->id=="usaha")?'class="active"':"";?>><?= FAS::icon('hotel');?> Profil UMKM</a></li>
            <li><a href="<?= Url::base() . "/omset/index";?>" <?= (Yii::$app->controller->id=="omset")?'class="active"':"";?>><?= FAS::icon('money-check-alt');?> Omset</a></li>
            
            <?php
              if (!empty(Yii::$app->user) && Yii::$app->user->can("admin")){

            ?>
            <li><a href="<?= Url::base() . "/grafik/index";?>" <?= (Yii::$app->controller->id=="grafik")?'class="active"':"";?>><?= FAS::icon('chart-line');?> Grafik</a></li>
            <li><a href="<?= Url::base() . "/user/admin";?>" <?= (Yii::$app->controller->id=="admin")?'class="active"':"";?>><?= FAS::icon('user');?> User</a></li>

            <?php
              }
            ?>

        </div>
      </div>
    </nav>
    <div class="page">
      <!-- navbar-->
      <header class="header">
        <nav class="navbar" style="background:#ecf0f1;color:#2980b9">
          <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
              <div class="navbar-header"><a id="toggle-btn" href="#" class="menu-btn" style="background:#bdc3c7"><?= FAS::icon('bars'); ?></a><a href="index.html" class="navbar-brand">
                  <div class="brand-text d-none d-md-inline-block"><span></span> <strong class="text-info">BRI Incubator</strong></div></a></div>
              <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">
                <!-- Log out-->
                  <?php
                    if (empty(Yii::$app->user->id)) {
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
              <p>Genpro &copy; 2017-2019</p>
            </div>
            <div class="col-sm-6 text-right">
              <p>Design by <a href="https://bootstrapious.com/p/bootstrap-4-dashboard" class="external">Genpro</a></p>
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
