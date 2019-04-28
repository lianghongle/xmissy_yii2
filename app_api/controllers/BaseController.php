<?php
namespace api\controllers;

use Yii;

/**
 * AIP 所有 Controller 基类
 *
 * Class BaseController
 * @package backend\controllers
 */
class BaseController extends \strong\web\controllers\ApiController
{
    public function actionIndex()
    {
        echo 1;die;
    }
}
