<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\WeitaiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '胃泰预约';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="weitai-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>



    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'name',
            [
                'attribute'=>'name',
                'contentOptions'=>['width'=>'180px'],
            ],
            //'tel',
            [
                'attribute'=>'tel',
                'contentOptions'=>['width'=>'180px'],
            ],
            'disease',
            'cdate',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
