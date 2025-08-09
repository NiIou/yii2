<?php

namespace frontend\models;

use yii\base\Model;
use Yii;

class IndexForm extends Model{

    public function get_news()
    {
        $sql = $sql = "SELECT * FROM `news`;";
        return Yii::$app->db->createCommand($sql)->queryAll();

    }

    public function get_news_one($id){
        $sql = "SELECT * FROM `news` WHERE `id` = $id;";
        return Yii::$app->db->createCommand($sql)->queryOne();
    }
}