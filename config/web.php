<?php

Yii::setAlias('@themes', dirname(__DIR__) . '/themes');
$params = require(__DIR__ . '/params.php');
use kartik\mpdf\Pdf;

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'language' => 'th',
    'modules' => [
        'gridview' => [
            'class' => '\kartik\grid\Module' //Export 
        ],
        'user' => [
            'class' => 'dektrium\user\Module',
        ],
    ],
    'components' => [
   // setup Krajee Pdf component
    'pdf' => [
        'class' => Pdf::classname(),
        'format' => Pdf::FORMAT_A4,
        'orientation' => Pdf::ORIENT_PORTRAIT,
        'destination' => Pdf::DEST_BROWSER,
        // refer settings section for all configuration options
    ],
        //Cart
        'cart' => [
            'class' => 'yz\shoppingcart\ShoppingCart',
            'cartId' => 'my_application_cart',
        ],
        // Format ว/ด/ป ภาษาไทย
        'thaiFormatter' => [
            'class' => 'dixonsatit\thaiYearFormatter\ThaiYearFormatter',
        ],
        /////////////////////////
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'cptAfR4ZoNM81Y54zFCnlJ_CzyrgT4BI',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
//        'user' => [
//            'identityClass' => 'app\models\User',
//            'enableAutoLogin' => true,
//        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = 'yii\debug\Module';

    $config['bootstrap'][] = 'gii';
    // $config['modules']['gii'] = 'yii\gii\Module';
    //$config['modules']['gii'] = ['class' => 'yii\gii\Module', 'allowedIPs' => ['1.179.182.82']];

    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'allowedIPs' => ['127.0.0.1', '::1', '192.168.0.*', '1.179.182.82'],
    ];
}

return $config;
return array_merge_recursive($config, require($_SERVER['DOCUMENT_ROOT'] . '/vendor/noumo/easyii/config/easyii.php'));
