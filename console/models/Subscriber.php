<?php
namespace console\models;

use Yii;

use yii\base\Model;

class Subscriber extends Model
{
    public static function getList(){

        $sql= 'SELECT * FROM subscriber';
        return Yii::$app->db->createCommand($sql)->queryAll();
    }

}