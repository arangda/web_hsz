<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-api',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'api\controllers',
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-api',
            'enableCookieValidation' => true,
            'cookieValidationKey' => 's-jT3fzSj92ifDZrOb1aikq1zqwCYIIf',
            'parsers' => [
                'application/json'=>'yii\web\JsonParser',
                'text/json'=>'yii\web\JsonParser',
            ]
        ],
        'user' => [
            'identityClass' => 'common\models\Adminuser',
            'enableAutoLogin' => true,
            'enableSession'=>false,
            //'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        //'session' => [
            // this is the name of the session cookie used for login on the frontend
        //    'name' => 'advanced-frontend',
       // ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],

        'urlManager' => [
            'enablePrettyUrl' => true,
            'enableStrictParsing'=>true,
            'showScriptName' => false,
            'rules' => [
                [
                    'class'=>'yii\rest\UrlRule',
                    'controller'=>'article'
                ],
                [
                    'class'=>'yii\rest\UrlRule',
                    'controller'=>'register'
                ],
                [
                    'class'=>'yii\rest\UrlRule',
                    'controller'=>'weitai'
                ],
                [
                    'class'=>'yii\rest\UrlRule',
                    'controller'=>'top10',
                    'except'=>['delete','create','update','view'],
                    'pluralize'=>false,
                ],
            ],
        ],
        'mailer'=>[
            'class'=>'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            'useFileTransport' => false,
            'transport' =>[
                'class'=>'Swift_SmtpTransport',
                'host'=>'smtp.qq.com',
                'username'=>'273890638@qq.com',
                'password'=>'xg273890638',
                'port'=>'25',
                'encryption'=>'tls',
            ],
            'messageConfig'=>[
                'charset'=>'UTF-8',
                'from'=>['273890638@qq.com'=>'预约系统']
            ]
        ]

    ],
    'params' => $params,
];
