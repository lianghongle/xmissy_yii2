<?php
namespace api\controllers;

use api\consts\ErrorCode;
use strong\helpers\StringHelper;
use strong\validators\PhoneValidator;
use Yii;
use yii\base\Exception;

/**
 * 账号 Controller
 *
 * Class TokenController
 * @package api\controllers
 */
class AccountController extends BaseController
{
    /**
     *
     */
    public function actionRegister()
    {
        
    }

    /**
     * 发送手机验证码
     *
     * @return array
     * @throws Exception
     */
    public function actionSendCode()
    {
        $phone = Yii::$app->request->get('phone', '');

        if(empty($phone)){
            throw new Exception("", ErrorCode::PARAM_MISSING);
        }

        $phoneValidator = new PhoneValidator();
        if($phoneValidator->validate($phone)){
            throw new Exception("", ErrorCode::FAIL);
        }

        $code = StringHelper::random(6, null, [StringHelper::CHAR_NUMBER]);

        if(!YII_DEBUG){
            //      如果所选网关列表均发送失败时，将会抛出 `Overtrue\EasySms\Exceptions\NoGatewayAvailableException` 异常
            $result = Yii::$app->easysms->send($phone, [
                //                'content' => '',
                //                "sign" => "腾讯云",
                'template' => '1597181',
                'data' => [
                    'code' => $code,
                    'limit' => 2,
                ],
            ]);

            return [
                'code' => ErrorCode::SUCCESS,
                'msg' => '',
                'data' => []
            ];
        }else{
            return [
                'code' => ErrorCode::SUCCESS,
                'msg' => '',
                'data' => $code
            ];
        }
    }
}
