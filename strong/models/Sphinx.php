<?php
namespace strong\models;

class Sphinx extends Model
{
    public static function getDb()
    {
        return \Yii::$app->sphinx;
    }
}