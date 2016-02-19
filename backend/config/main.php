<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [
        'audit' => [
            // IP address or list of IP addresses with access to the viewer, null for everyone (if the IP matches)
            'accessIps' => ['127.0.0.1', '192.168.*'],
            // Role or list of roles with access to the viewer, null for everyone (if the user matches)
            'accessRoles' => ['admin'],
            // User ID or list of user IDs with access to the viewer, null for everyone (if the role matches)
            'accessUsers' => [1, 2],
            // more: https://bedezign.github.io/yii2-audit/docs/module-configuration/
        ],
        'user' => [
            // following line will restrict access to admin page
            'as backend' => 'backend\filters\BackendFilter',
        ],
        'dashboard' => [
            'class'=>'cornernote\dashboard\Module',
        ],
    ],
    'components' => [
        'user' => [
            'identityClass' => 'dektrium\user\models\User',
            'identityCookie' => [
                'name'     => '_backendIdentity',
                'path'     => '/',
                'httpOnly' => true,
            ],
        ],
        'session' => [
            'name' => 'BACKENDSESSID',
            'cookieParams' => [
                'httpOnly' => true,
                'path'     => '/',
            ],
        ],
        'view' => [
            'theme' => [
                'pathMap' => [
                    '@app/views' => '@app/themes/adminlte',
                    '@app/modules' => '@app/themes/adminlte'
                ],
                'baseUrl' => '@app/themes/adminlte',
            ],
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
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
    ],
    'params' => $params,
];
