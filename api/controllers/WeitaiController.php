<?php
/**
 * User: arangda
 * Date: 2018/2/14
 * Time: 17:18
 */
namespace api\controllers;

use yii\data\ActiveDataProvider;
use yii\rest\ActiveController;
use yii\filters\Cors;
use yii\helpers\ArrayHelper;

class WeitaiController extends ActiveController
{

    public function behaviors()
    {
        return ArrayHelper::merge(parent::behaviors(), [
            'authenticator' => [
                'class' => QueryParamAuth::className(),
            ],
            [
                'class' => Cors::className(),
                'cors' => [
                    'Origin' => ['*'],//定义允许来源的数组
                    'Access-Control-Request-Method' => ['GET','POST','PUT','DELETE', 'HEAD', 'OPTIONS'],//允许动作的数组
                ],
                'actions' => [
                    'index' => [
                        'Access-Control-Allow-Credentials' => true,
                    ]
                ]
            ],
        ]);
    }
    public $modelClass = 'common\models\Weitai';

}
