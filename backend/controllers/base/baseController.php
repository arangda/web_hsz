<?php
namespace backend\controllers\base;
/**
 * User: arangda
 * Date: 2018/2/27
 * Time: 8:21
 * 基础控制器
 */
use Yii;
use yii\web\controller;
use yii\filters\AccessControl;

class baseController extends controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index','create','update','delete','view','upload'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
    ];
    }
}