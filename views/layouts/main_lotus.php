<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;

//use app\assets\AppAsset;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<!--[if lt IE 9]> <html lang="th" class="ie8"> <![endif]-->
<!--[!(IE)]><!-->
<html lang="th">
    <!--<![endif]-->

    <head>
        <meta charset="utf-8" />
        <title>ระรบบงานงานทันตกรรม</title>
        <link rel="shortcut icon" href="http://www.tescolotus.com/assets/favicon.ico">
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />

        <!-- Bootstrap -->
        <link href="http://www.tescolotus.com/assets/css/bootstrap.css" rel="stylesheet" />

        <!-- Template ICWEB -->
        <link href="http://www.tescolotus.com/assets/css/theme.css" rel="stylesheet" />
        <link href="http://www.tescolotus.com/assets/css/theme-responsive.css" rel="stylesheet" />
        <link href="http://www.tescolotus.com/assets/css/highlight.css" rel="stylesheet" />
        <link href="http://www.tescolotus.com/assets/css/px-slideOx.css" rel="stylesheet" />

        <!--[if lte IE 9]>
        <link rel="stylesheet" href="http://www.tescolotus.com/assets/css/ie8.css" />
        <script type="text/javascript" src="http://www.tescolotus.com/assets/common/js/assets/html5shiv.js"></script>
        <script type="text/javascript" src="http://www.tescolotus.com/assets/common/js/assets/selectivizr-min.js"></script>
    <![endif]-->
    </head>

    <body>
        <div id="modeScreen"></div>


        <meta name="alexaVerifyID" content="9g8ipmz2Zas5b-ThMXcGDvpxueU"/>
        <!--Google Analytics - End--><!-- Analyticstracking -->

        <?php $this->beginBody() ?>
        <div class="wrap">
            <header id="header">
                <div class="wrapper noRelative">
                    <a href="http://www.tescolotus.com/home">
                        <!--<img src="http://www.tescolotus.com/assets/common/img/logo.png" class="logo">-->
                    </a>
                    <nav class="main-menu">
                        <ul>
                            <li class=""><a href="index.php">หน้าหลัก</a></li>

                            <li class="hover " data-dropdown="service">
                                <a href="#">ตั้งค่าระบบ</a>

                                <nav class="dropdown-pane">
                                    <div class="wrapper">
                                        <div class="menu-dropdown">
                                            <div class="row">
                                                <div class="col col-md-4">
                                                    <p class="font-green bold">ข้อมูลพื้นฐาน</p>
                                                    <ul>
                                                        <li><a href="index.php?r=products">วัสดุ</a></li>
                                                        <li><a href="index.php?r=partner">ข้อมูลคู่ค้า</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col col-md-4">
                                                    <p class="font-green bold">บริการด้านการเงินและประกันภัย</p>
                                                    <ul>
                                                        <li><a href="http://www.tescolotus.com/service/financial">บัตรเครดิต</a></li>
                                                        <li><a href="http://www.tescolotus.com/service/financial#loans-section">สินเชื่อ</a></li>
                                                        <li><a href="http://www.tescolotus.com/service/financial#insure-section">ประกันภัย</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col col-md-4">
                                                    <p class="font-green bold">บริการ</p>
                                                    <ul>
                                                        <li><a href="http://www.tescolotus.com/service/payment">บิลเพย์เม้นท์</a></li>
                                                        <li><a href="http://www.tescolotus.com/service/sim">ซิมมือถือ/เติมเงินออนไลน์</a></li>
                                                        <li><a href="http://www.tescolotus.com/service/ticket">จองตั๋ว</a></li>
                                                        <li><a href="http://www.tescolotus.com/service/post">ส่งพัสดุ</a></li>
                                                        <li><a href="http://www.tescolotus.com/service/fax">ถ่ายเอกสาร/ส่งแฟ็กซ์</a></li>
                                                        <li><a href="http://www.tescolotus.com/service/giftcard">บัตรของขวัญ</a></li>
                                                        <li><a href="http://www.tescolotus.com/service/financial">บริการด้านการเงิน</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <nav>
                                                <p class="bold">มองหาของขวัญอยู่หรือไม่?</p>
                                                <ul class="list-inline">
                                                    <li><a href="http://www.tescolotus.com/service/giftcard#giftcard-section" class="bold link">บัตรกิ๊ฟท์การ์ด</a></li>
                                                    <li><a href="http://www.tescolotus.com/service/giftcard" class="bold link">บัตรของขวัญ</a></li>
                                                    <li><a href="http://shoponline.Tescolotus.com/th-TH/" target="_blank" class="bold link">ช้อปปิ้งออนไลน์</a></li>
                                                </ul>
                                            </nav>
                                        </div>
                                        <div class="right"><img src="http://www.tescolotus.com/assets/common/img/img-rollover-onestop.jpg"></div>
                                    </div>
                                </nav>
                            </li>
                                                        <li class=""><a href="#">ข่าวและกิจกรรม</a></li>
                        </ul>
                    </nav>
                    <ul class="right-menu">
                        <li class="top-language"><a href="http://www.tescolotus.com/en/home" class="en active">EN</a></li>


                        <li>
                            <form id="btsearch_bar">
                                <input type="text" placeholder="คำค้นหา" maxlength="40" id="keyword_search">
                                <button type="submit" class="btn"><i class="ico-font-tesco icon-search"></i></button>
                            </form>
                        </li>
                        <li><a href="http://shoponline.Tescolotus.com/th-TH/?utm_source=CorporateWebsite&utm_medium=Link&utm_campaign=Corporate" class="btn btn-br-green btn-shop" target="_blank">
                                <i class="ico-font-tesco icon-shoponline"></i>
                                ค้นหา</a>
                        </li>
                    </ul>
                </div>

            </header>

            <!-- header tablet -->
            <header id="header-tablet">
                <div class="wrapper">
                    <a href="http://www.tescolotus.com/home">
                        <img src="http://www.tescolotus.com/assets/common/img/logo.png" class="logo">
                    </a>
                    <a href="#" class="btn-menu"><i class="fa fa-bars"></i></a>
                    <div class="clearfix"></div>
                </div>
                <nav>
                    <form id="btsearch_bar_tablet">
                        <div class="wrapper">
                            <div class="relative">
                                <input type="text" placeholder="คำค้นหา" maxlength="40" id="keyword_search_tablet">
                                <button type="submit" class="btn"><i class="fa fa-search"></i></button>
                            </div>
                            <ul class="s-20-15">

                                <li class=""><a href="http://www.tescolotus.com/location">สาขา</a></li>
                            </ul>
                        </div>
                        <div class="line"></div>
                        <div class="wrapper">
                            <div class="row s-20-15">
                                <div class="col-sm-6 col-xs-6">
                                    <a href="http://www.tescolotus.com/member" class="btn btn-login">Log In</a></li>
                                </div>
                                <div class="col-sm-6 col-xs-6">
                                    <a href="http://shoponline.Tescolotus.com/th-TH/?utm_source=CorporateWebsite&utm_medium=Link&utm_campaign=Corporate" class="btn btn-br-green btn-shop pull-right" target="_blank">
                                        <i class="ico-font-Tesco icon-shopping"></i>
                                        Shop Online</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </nav>
            </header>
            <!-- header tablet -->

            <!-- header mobile -->
            <header id="header-mobile">
                <div class="wrapper">
                    <a href="http://www.tescolotus.com/home">
                        <img src="http://www.tescolotus.com/assets/common/img/logo.png" class="logo">
                    </a>
                    <a href="#menu" class="btn-menu"><i class="fa fa-bars"></i></a>
                    <a href="http://www.tescolotus.com/location" class="btn-locator"><i class="fa fa-map-marker"></i></a>
                    <a href="http://shoponline.Tescolotus.com/th-TH/?utm_source=CorporateWebsite&utm_medium=Link&utm_campaign=Corporate" target="_blank" class="btn-shop-mobile"><i class="ico-font-tesco icon-shoponline"></i></a>
                    <a href="http://www.tescolotus.com/member" class="btn-login"><i class="ico-font-tesco icon-avatar"></i></a>
                    <a href="http://www.tescolotus.com/en/home" class="btn-lg-mobile">EN</a>
                    <div class="clearfix"></div>
                </div>
            </header>
            <!-- header mobile -->


            <main id="main">  
                <div class="container">
                    <?= $content ?>
                </div>
            </main>


        </div>
        <!-- page -->

        <!-- Footer -->
        <footer id="footer">
            <section class="footer-menu">
                <nav class="wrapper">
                    <div class="col-left">
                        <p>ลงทะเบียนรับข่าวสาร</p>
                        <form id="formmember">
                            <ul class="list-inline">
                                <li class="txt-mobile">ลงทะเบียนรับข่าวสาร</li>
                                <li><input name="enews_email" type="text"></li>
                                <li><button type="button" class="btn btn-std btn-c-red" onclick="SubmitENews('formmember');
                                            return false;">สมัคร</button></li>
                            </ul>
                        </form>
                        <ul class="list-inline social-group desktop">
                            <li>
                                <a href="https://www.facebook.com/TescoLotus" target="_blank"  class="btn-social facebook" title="facebook"><i></i></a>
                            </li>
                            <li>
                                <a href="https://twitter.com/TescoLotus" target="_blank" class="btn-social twitter" title="twitter"><i></i></a>
                            </li>
                            <li>
                                <a href="https://www.youtube.com/channel/UCHXhjRMZ5vArF3tMRXIZ6fA" class="btn-social youtube" target="_blank" title="youtube"><i></i></a>
                            </li>
                            <li>
                                <a href="https://itunes.apple.com/th/app/Tesco-lotus/id673983521?mt=8" class="btn-social appstore" target="_blank" title="appstore"><i></i></a>
                            </li>
                            <li>
                                <a href="https://play.google.com/store/apps/developer?id=Tesco+LOTUS&hl=en" class="btn-social googleplay" target="_blank" title="googleplay"><i></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="col-right">

                    </div>
                </nav>
            </section>
            <section class="copyRight wrapper">
                <p>Copyright © 2015 xxxx. All rights reserved.</p>
                <ul class="text-center list-inline social-group mobile">
                    <li>
                        <a href="https://www.facebook.com/TescoLotus" target="_blank"  class="btn-social facebook" title="facebook"><i></i></a>
                    </li>
                    <li>
                        <a href="https://twitter.com/TescoLotus" target="_blank" class="btn-social twitter" title="twitter"><i></i></a>
                    </li>
                    <li>
                        <a href="https://www.youtube.com/channel/UCHXhjRMZ5vArF3tMRXIZ6fA" class="btn-social youtube" target="_blank" title="youtube"><i></i></a>
                    </li>
                    <li>
                        <a href="https://itunes.apple.com/th/app/Tesco-lotus/id673983521?mt=8" class="btn-social appstore" target="_blank" title="appstore"><i></i></a>
                    </li>
                    <li>
                        <a href="https://play.google.com/store/apps/developer?id=Tesco+LOTUS&hl=en" class="btn-social googleplay" target="_blank" title="googleplay"><i></i></a>
                    </li>
                </ul>
                <ul class="list-inline term-privacy">
                    <li><a href="http://www.tescolotus.com/terms">Terms & Condition</a></li>
                    <li><a href="http://www.tescolotus.com/privacy">Privacy Policy</a></li>
                </ul>
            </section>    
        </footer>
        <a href="#" class="backtotop-btn"><i class="fa fa-angle-up"></i></a>
        <!-- menu-mobile -->
        <script src="http://www.tescolotus.com/assets/common/js/jquery-1.11.2.min.js"></script>
        <script src="http://www.tescolotus.com/assets/common/js/jquery.easing.1.3.js"></script>
        <script src="http://www.tescolotus.com/assets/common/js/bootstrap/bootstrap.min.js"></script>
        <script src="http://www.tescolotus.com/assets/common/js/assets/jquery.mmenu.min.all.js"></script>
        <script src="http://www.tescolotus.com/assets/common/js/assets/jquery.touchSwipe.min.js"></script>
        <script src="http://www.tescolotus.com/assets/common/js/global.js"></script>
        <script src="http://www.tescolotus.com/assets/common/js/assets/highlight.js"></script>
        <script src="http://www.tescolotus.com/assets/common/js/px-slideOX.js"></script>
        <script src="http://www.tescolotus.com/assets/common/js/assets/jquery.iosslider.js"></script>
        <script src="http://www.tescolotus.com/assets/common/js/assets/jquery.balloon.js"></script>

    </body>

</html>