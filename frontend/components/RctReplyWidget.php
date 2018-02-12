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

class RctReplyWidget extends Widget
{
    public $recentComments;

    public function init()
    {
        parent::init();
    }

    public function run()
    {
        $commentString='';

        foreach ($this->recentComments as $comment)
        {
            $commentString.='<div class="post">'.
                '<div class="title">'.
                '<p style="color:#777777;font-style:italic;">'.
                nl2br($comment->content).'</p>'.
                '<p class="text"> <span class="glyphicon glyphicon-user" aria-hidden="ture">
							</span> '.Html::encode($comment->user->username).'</p>'.

                '<p style="font-size:8pt;color:bule">
							《<a href="'.$comment->post->url.'">'.Html::encode($comment->post->title).'</a>》</p>'.
                '<hr></div></div>';
        }
        return  $commentString;
    }
}