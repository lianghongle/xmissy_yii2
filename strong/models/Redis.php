<?php
namespace strong\models;

/**
 * Class Redis
 * @package strong\models
 */
class Redis extends Model
{
    public static function getDb()
    {
        return \Yii::$app->redis;
    }
}