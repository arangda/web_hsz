<?php
/**
 * User: arangda
 * Date: 2018/2/14
 * Time: 17:18
 */
namespace api\controllers;

use yii\rest\ActiveController;

class ArticleController extends ActiveController
{
    public $modelClass = 'common\models\Post';
}
