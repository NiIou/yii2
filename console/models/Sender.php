<?php

namespace console\models;

use Yii;
class Sender
{
    public static function run($subscribers, $newslist){


        foreach ($subscribers as $subscriber) {

            $result = Yii::$app->mailer->compose('/mailer/newslist', [
                'newslist' => $newslist
            ])
                ->setFrom('test.php.up@gmail.com')
                ->setTo($subscriber['email'])
                ->setSubject('Test mail')
                ->setTextBody('Test mail')
                ->setHtmlBody('Test mail')
                ->send();
            var_dump($result);

        }



    }

}