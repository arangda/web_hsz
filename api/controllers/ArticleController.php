<?php
/**
 * User: arangda
 * Date: 2018/2/14
 * Time: 17:18
 */
namespace api\controllers;

use yii\data\ActiveDataProvider;
use yii\rest\ActiveController;

class ArticleController extends ActiveController
{
    public $modelClass = 'common\models\Post';

    public function actions()
    {
        $actions = parent::actions(); // TODO: Change the autogenerated stub
        unset($actions['index']);
        return $actions;
    }

    public function actionIndex()
    {
        $modelClass = $this->modelClass;
        return new ActiveDataProvider(
            [
                'query'=>$modelClass::find(),
                'pagination'=>['pageSize'=>5],

            ]
        );
    }


}
