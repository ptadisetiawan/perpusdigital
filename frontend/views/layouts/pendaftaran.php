<?php

/* @var $this \yii\web\View */
/* @var $content string */

use frontend\assets\AppAssetB;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\PendaftaranAsset;
use common\widgets\Alert;
use yii\helpers\Url;

$asset = AppAssetB::register($this);
$baseurl = $asset->baseUrl;
$subtitle="";
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title>Perpustakaan Digital</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="shortcut icon" type='image/x-icon' href="<?=Yii::$app->urlManager->createUrl('../uploaded_files/aplikasi/favicon.png');?>">

    <?php $this->head() ?>
</head>


<body class="skin-blue layout-top-nav">
    <!-- <div class="wrapper" style=" background-color: #FFF;"> -->
        <!-- Header web -->
        <header style="color:#FFFFFF">
            <nav style="background-color:#B20909; color:#FFFFFF" class="navbar navbar-default">
                <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar2">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                    <a style="text-decoration:none; color:#FFFFFF; margin-top:-20px;" class="navbar-brand" href="#">
                    <!-- <img style="height: 100%;
                    padding: 15px;
                    width: auto; padding: 7px 15px;" src="https://res.cloudinary.com/candidbusiness/image/upload/v1455406304/dispute-bills-chicago.png" alt="Logo"> -->
                    <h3>Perpustakaan Provinsi Bali</h3>
                    </a>
                </div>
                <div id="navbar2" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav navbar-right">
                       
                        <?php 
                            if (Yii::$app->user->isGuest) {
                            echo"
                                <li><a style='text-decoration:none; color:#FFFFFF' class='mr-2' href=\"javascript:void(0)\"  onclick='tampilLogin()'>Login</a></li>
                            ";
                            } else {
                            echo"
                            <li><a style='text-decoration:none; color:#FFFFFF' class='mr-2' href=\"".$homeUrl."site/logout  \">Logout (" . $noAnggota.")</a></li>
                            ";

                            $_SESSION['__NoAnggota']= $noAnggota;
                            }
                            ?>
                    
                    </ul>
                </div>
                <!--/.nav-collapse -->
                </div>
            </nav>
</header>


    <?php $this->beginBody() ?>
    <!-- <div class="content-wrapper" style="min-height: 507px;background-color: #ecf0f5;"> -->
    <div class="content-wrapper" style="min-height: 507px;background-color: #fff;">
        <div class="container">
            <!-- Content Header (Page header) -->

            <!-- Main content -->
            <section class="content">
                <?= Alert::widget() ?>
                <div class="">
                    <?= $content ?>
                </div>
            </section><!-- /.content -->
        </div><!-- /.container -->
    </div><!-- /.content-wrapper -->


    <footer class="footer main-footer">
        <div class="container">
            <div class="pull-right hidden-sm" style="font-family: "Corbel", Arial, Helvetica, sans-serif;">
            <?=\Yii::$app->params['footerInfoRight'];?>
        </div>
        <?= yii::t('app',\Yii::$app->params['footerInfoLeft']); ?> &copy; <?= yii::t('app',\Yii::$app->params['year']); ?> <a href="http://inlislite.perpusnas.go.id" target="_blank"><?= yii::t('app','Perpustakaan Nasional Republik Indonesia') ?></a>
</div> <!-- /.container -->
</footer>
<?php $this->endBody() ?>
<!-- </div>./wrapper -->
</body>
</html>
<?php $this->endPage() ?>
<?php $lang = Yii::$app->config->get('language'); ?>
<script>
    //alert(Date());
  function startTime()
    {   var today=new Date();
        var weekday=new Array(7);
        var weekday=["Minggu","Senin","Selasa","Rabu","Kamis","Jum'at","Sabtu"];
        var weekday_en=new Array(7);
        var weekday_en=["Sunday","Monday","Tuesday","Wednesday","Thursday","Friday","Saturday"];
        var monthname=new Array(12);
        var monthname=["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];
        var monthname_en=new Array(12);
        var monthname_en=["January","February","March","April","May","June","July","August","September","October","November","December"];
        var dayname=weekday[today.getDay()];
        var day=today.getDate();
        var month=monthname[today.getMonth()];
        var year=today.getFullYear();
        var h=today.getHours();
        var m=today.getMinutes();
        var s=today.getSeconds();
        h=checkTime(h);
        m=checkTime(m);
        s=checkTime(s);
        if ('<?= $lang ?>'=='en') {
            var dayname=weekday_en[today.getDay()];
            var month=monthname_en[today.getMonth()];
        }else{
            var dayname=weekday[today.getDay()];
            var month=monthname[today.getMonth()];
        }
        document.getElementById('clocktime').innerHTML=dayname+", "+day+" "+month+" "+year+", "+h+":"+m+":"+s;
        t=setTimeout(function(){startTime()},500);
    }
    // function checkTime to add a zero in front of numbers < 10
    function checkTime(i)
    {   if(i<10){i="0"+i;}
        return i;
    }
</script>


