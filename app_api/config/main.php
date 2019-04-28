<?php

use api\consts\ErrorCode;
use yii\web\Response;

$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

$config = [
    'id' => 'app-api',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'api\controllers',
    'bootstrap' => ['log'],
    'modules' => [],
    'components' => [

        // todo 加密解密、数据校验、业务参数与通用参数
        'request' => [
            'csrfParam' => '_csrf-api',

            //api 关闭Csrf验证
            'enableCsrfValidation' => false,
        ],

        // todo 响应
        'response' => [
            'class'         => yii\web\Response::class,
            'format'        => Response::FORMAT_JSON,
            'on beforeSend' => function ($event) {
                // debug/gii 工具不用 json，Yii::$app->module->id 方式无效
                $requestedRoute = explode('/', yii::$app->requestedRoute);

                if($requestedRoute[0] == 'debug' || $requestedRoute[0] == 'gii'){

                }else{
                    /* @var $response \yii\web\Response */
                    $response = $event->sender;

                    $original_data = $response->data;
                    $data = [];

                    if(!isset($original_data['code'])){
                        $data['code'] = ErrorCode::SUCCESS;
                    }else{
                        $data['code'] = $original_data['code'];
                    }

                    if (!isset($original_data['msg']) || empty($original_data['msg'])) {
                        $data['msg'] = isset(ErrorCode::$err_msg[$original_data['code']]) ?
                            ErrorCode::$err_msg[$original_data['code']] : '';
                    }

                    if ($response->getStatusCode() != 200) {
                        if(!YII_DEBUG){
                            $response->setStatusCode(200);

                            $data['data'] = [];
                        }
                    }else{
                        $data['data'] = $original_data['data'];
                    }

                    $response->data = $data;
                }
            },
            'on afterSend' => function ($event) {

            }
        ],

        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
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
//            'errorAction' => 'site/error',
            'class' => yii\web\ErrorHandler::class
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
    ],
    'params' => $params,
];

return $config;
