<?php
/**
 * User: arangda
 * Date: 2018/2/13
 * Time: 15:52
 */
namespace console\controllers;

use yii\console\Controller;
use common\models\Post;

class HelloController extends Controller
{
    public function actionIndex()
    {
        echo "Hello World! \n";
    }

    public function actionList()
    {
        $posts = Post::find()->all();
        foreach ($posts as $aPost)
        {
            echo $aPost->id.'--'.$aPost->title." \n";
        }
    }

    public function actionWho($name)
    {
        echo "Hello ".$name."!\n";
    }
}