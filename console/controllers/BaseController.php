<?php
namespace console\controllers;

use Yii;

/**
 * console 所有 Controller 基类
 *
 * Class BaseController
 * @package console\controllers
 */
class BaseController extends \strong\console\ConsoleController
{
    public function actionIndex()
    {
        echo 1 . PHP_EOL;
    }
}
