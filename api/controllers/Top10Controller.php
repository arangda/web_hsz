<?php
/**
 * User: arangda
 * Date: 2018/2/14
 * Time: 17:18
 */
namespace api\controllers;


use yii\db\Query;
use yii\rest\Controller;

class Top10Controller extends Controller
{

    public function actionIndex()
    {
        $top10 = (new Query())
            ->from('post')
            ->select(['author_id','Count(id) as creatercount'])
            ->groupBy(['author_id'])
            ->orderBy('creatercount DESC')
            ->limit(10)
            ->all();
        return $top10;
    }
}
