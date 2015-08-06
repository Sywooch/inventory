<?php

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
//use app\assets\AppAsset;
use app\assets\BootflatAsset;


/* @var $this \yii\web\View */
/* @var $content string */

//AppAsset::register($this);
BootflatAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
      
        <?php $this->head() ?>
    </head>
    <body style="background: #ffffff;">

        <?php $this->beginBody() ?>
        <div class="wrap">
            <?php
            NavBar::begin([
                'brandLabel' => 'ระบบงานทันตกรรม',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-default',
                ],
            ]);
            echo Nav::widget([
               'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => [
                    ['label' => 'หน้าหลัก', 'url' => ['/site/index']],
              Yii::$app->user->isGuest ? '' :
                    ['label' => 'บันทึกประจำวัน', 'url' => ['inventory/index'],],
//                    ['label' => 'About', 'url' => ['/site/about']],
//                    ['label' => 'Contact', 'url' => ['/site/contact']],
                  Yii::$app->user->isGuest ? '' :
                    [
                        'label' => 'รายงาน',
                        'items' => [
                            ['label' => 'พัสดุคงคลัง', 'url' => 'index.php?r=products'],
                           // '<li class="divider"></li>',
                          //  '<li class="dropdown-header">Dropdown Header</li>',
                            ['label' => 'งบประมาณ', 'url' => 'index.php?r=productmain'],
                        ],
                    ],
                    [
                        'label' => 'ตั้งค่าพื้นฐาน',
                        'items' => [
                            ['label' => 'ข้อมูลพัสดุ', 'url' => 'index.php?r=products'],
                           // '<li class="divider"></li>',
                          //  '<li class="dropdown-header">Dropdown Header</li>',
                            ['label' => 'หมวดหมู่หลัก', 'url' => 'index.php?r=productmain'],
                             ['label' => 'หมวดหมู่รอง', 'url' => 'index.php?r=category'],
                             ['label' => 'บริษัทคู่ค้า', 'url' => 'index.php?r=partner'],
                             ['label' => 'งบประมาณ', 'url' => 'index.php?r=budget'],
                             ['label' => 'หน่วยนับ', 'url' => 'index.php?r=unit'],
                             ['label' => 'หน่วยงาน', 'url' => 'index.php?r=department'],
                             ['label' => 'เจ้าหน้าที่พัสดุ', 'url' => 'index.php?r=productuser'],
                        ],
                    ],
                    Yii::$app->user->isGuest ?
                            ['label' => 'Login', 'url' => ['/user/security/login']] :
                            ['label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                        'url' => ['/user/security/logout'],
                        'linkOptions' => ['data-method' => 'post']],
                ],
            ]);
            NavBar::end();
            ?>

            <div class="container" style="margin-top: 10px;">
                <?=
                Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ])
                ?>
                <?= $content ?>

            </div>
        </div>
        
        
        
        


        <br><br><br><br><br><br><br><br>
        

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
