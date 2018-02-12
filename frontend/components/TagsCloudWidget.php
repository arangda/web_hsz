<?php
/**
 * User: arangda
 * Date: 2018/2/12
 * Time: 14:20
 */

namespace frontend\components;
use yii;
use yii\Base\Widget;
use yii\helpers\Html;

class TagsCloudWidget extends Widget
{
    public $tags;

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        $tagString='';
        $fontStyle = array(
            "6"=>"danger",
            "5"=>"info",
            "4"=>"warning",
            "3"=>"primary",
            "2"=>"success",
            "1"=>"default",
        );
        foreach ($this->tags as $tag => $weight)
        {
            $tagString.='<a href="'.yii::$app->homeUrl.'?r=post/index&PostSearch[tags]='.$tag.'">'.
                '<h'.$weight.' style="display:inline-block;" ><span class="label label-'.$fontStyle[$weight].'">'.$tag
                .'</span></h'.$weight.'></a>';
        }
        return $tagString;
    }
}