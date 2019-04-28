<?php
namespace strong\models;

class Elasticsearch extends Model
{
    public static function getDb()
    {
        return \Yii::$app->elasticsearch;
    }
}