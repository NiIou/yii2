<?php
namespace console\models;
use Yii;
use yii\base\Model;

class News extends Model
{
    const STATUS_NOT_SEND = 1;
    public static function getList(){

        $sql = "SELECT * FROM news WHERE status = " . self::STATUS_NOT_SEND;
        $news = Yii::$app->db->createCommand($sql)->queryAll();
        return self::prepareList($news);

    }

    public static function prepareList($news){
        foreach ($news as &$item){
            $item['content'] = Yii::$app->stringHelper->getShort($item['content']);
        }
        return $news;

    }
}