<?php
/**
 * User: arangda
 * Date: 2018/2/14
 * Time: 17:18
 */
namespace api\controllers;

use Yii;
use common\models\Weitai;
use yii\data\ActiveDataProvider;
use yii\rest\ActiveController;
use yii\filters\Cors;
use yii\helpers\ArrayHelper;
use yii\web\ServerErrorHttpException;
use yii\db\Query;

class WeitaiController extends ActiveController
{
    public $modelClass = 'common\models\Weitai';


    public function behaviors()
    {
        return ArrayHelper::merge([
            [
                'class' => Cors::className(),
                'cors' => [
                    'Origin' => ['*'],
                    'Access-Control-Request-Method' => ['GET', 'POST', 'OPTIONS'],
                ],
                'actions' => [
                    'create' => [
                        'Access-Control-Allow-Credentials' => true,
                    ]
                ]
            ],
        ], parent::behaviors());
    }

    public function actions()
    {
        $actions = parent::actions(); // TODO: Change the autogenerated stub
        unset($actions['create']);
        return $actions;
    }

    public function actionCreate()
    {
        $model = new Weitai();
        $params = Yii::$app->request->bodyParams;
        $model->load($params, '');
        //检查同名人提交，小于一定时间禁止提交
        $model->rdate = date('Y-m-d H:i:s');
        $query = (new Query())
            ->from('weitai')
            ->select(['rdate'])
            ->limit(1)
            ->orderBy('id DESC')
            ->where(['name'=>$model->name])
            ->one();

         $lasttime = strtotime($query['rdate']);
         $nowtime = strtotime($model->rdate);
         if(($nowtime-$lasttime) < 20){
            return "不能重复提交信息！";
         }

        if ($model->save()) {
            //保存同时邮件发送给需要的人以便提醒
            $users= ['495694459@qq.com','273890638@qq.com','285262975@qq.com'];
            $messages = [];
            foreach ($users as $user)
            {
                $messages[] = Yii::$app->mailer->compose('weitai',['list'=>$params])
                        ->setTo($user)
                        ->setSubject("有人预约啦");
            }

            Yii::$app->mailer->sendMultiple($messages);

        }elseif (!$model->hasErrors()) {
            throw new ServerErrorHttpException('Failed to create the object for unknown reason.');
        }
        return $model;
    }


}
