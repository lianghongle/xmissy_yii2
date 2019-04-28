<?php

namespace api\consts;

/**
 * 返回码
 *
 * Class ReturnCode
 * @package common\consts
 */
class ErrorCode
{
    const SUCCESS = 0;//成功
    const FAIL    = -1;//操作失败

    const UPLOAD_FAIL  = 100001;//上传文件失败
    const UPLOAD_EMPTY = 100002;//请选择要上传的文件

    const THIRD_ERROR = 300000;//调用第三方异常

//    const PARAM_MISSING       = 10002;//缺少参数
//    const PARAM_WRONG         = 10003;//参数错误
//    const UNKNOWN_ERROR       = 10004;//未知错误（异常）
//    const PERMISSION_DENIED   = 10005;//无权访问
//    const EMPTY_DATA          = 10006;//结果为空
//    const INVALID_CREDENTIALS = 10007;//登陆信息无效

    static $err_msg = [
        self::SUCCESS             => '成功',
        self::FAIL                => '操作失败',

//        self::PARAM_MISSING       => '缺少参数',
//        self::PARAM_WRONG         => '参数错误',
//        self::UNKNOWN_ERROR       => '未知错误',
//        self::PERMISSION_DENIED   => '无权访问',
//        self::EMPTY_DATA          => '结果为空',
//        self::INVALID_CREDENTIALS => '登陆信息无效',

        self::UPLOAD_FAIL  => '上传文件失败',
        self::UPLOAD_EMPTY => '请选择要上传的文件',

        self::THIRD_ERROR => '第三方服务异常',
    ];
}
