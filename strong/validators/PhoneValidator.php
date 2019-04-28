<?php
namespace strong\validators;

use yii\base\NotSupportedException;
use yii\validators\Validator;

/**
 * 手机号码 验证器
 *
 * Class PhoneValidator
 * @package strong\validators
 */
class PhoneValidator extends Validator
{
    protected function validateValue($value)
    {
        return preg_match('/^1\d{10}$/', $value);
    }
}