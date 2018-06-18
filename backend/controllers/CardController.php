<?php

namespace backend\controllers;
use Yii;
use yii\imagine\Image;

class CardController extends \yii\web\Controller
{
    //public  $srcImg = Yii::getAlias('@webroot').'/images/new_pc_card.png';
    //public  $aimImg = '/images/new_pc_card2.png';

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionCreate()
    {
        $request = Yii::$app->request;
        $d_one = $request->post('done');
        $d_two = $request->post('dtwo');
        $d_three = $request->post('dthree');
        $d_four = $request->post('dfour');
        $d_five = $request->post('dfive');
        $d_six = $request->post('dsix');
        $d_seven = $request->post('dseven');
        $d_eight = $request->post('deight');
        Image::text('@webroot/images/new_pc_card.png', $d_one, '@webroot/font/wryh.ttf', [85,123] ,['color'=>'444','size'=>10])->save(Yii::getAlias("@webroot").'/images/card2.png', ['quality'=>100]);
        Image::text('@webroot/images/card2.png', $d_two, '@webroot/font/wryh.ttf', [222,123] ,['color'=>'444','size'=>10])->save(Yii::getAlias("@webroot").'/images/card2.png', ['quality'=>100]);
        Image::text('@webroot/images/card2.png', $d_three, '@webroot/font/wryh.ttf', [85,145] ,['color'=>'444','size'=>10])->save(Yii::getAlias("@webroot").'/images/card2.png', ['quality'=>100]);
        Image::text('@webroot/images/card2.png', $d_four, '@webroot/font/wryh.ttf', [222,145] ,['color'=>'444','size'=>10])->save(Yii::getAlias("@webroot").'/images/card2.png', ['quality'=>100]);
        Image::text('@webroot/images/card2.png', $d_five, '@webroot/font/wryh.ttf', [85,168] ,['color'=>'444','size'=>10])->save(Yii::getAlias("@webroot").'/images/card2.png', ['quality'=>100]);
        Image::text('@webroot/images/card2.png', $d_six, '@webroot/font/wryh.ttf', [222,168] ,['color'=>'444','size'=>10])->save(Yii::getAlias("@webroot").'/images/card2.png', ['quality'=>100]);
        Image::text('@webroot/images/card2.png', $d_seven, '@webroot/font/wryh.ttf', [346,172] ,['color'=>'444','size'=>10])->save(Yii::getAlias("@webroot").'/images/card2.png', ['quality'=>100]);
        Image::text('@webroot/images/card2.png', $d_eight, '@webroot/font/wryh.ttf', [85,190] ,['color'=>'444','size'=>10])->save(Yii::getAlias("@webroot").'/images/card2.png', ['quality'=>100]);
        echo "success";
    }
}
