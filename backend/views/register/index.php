<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\RegisterSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '提交预约';
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="register-index">

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
                'contentOptions'=>['width'=>'180px']
            ],
            //'tel',
            [
                'attribute'=>'tel',
                'contentOptions'=>['width'=>'180px']
            ],
            //'sex',
            [
                'attribute'=>'sex',
                'contentOptions'=>['width'=>'100px']
            ],
            //'age',
            [
                'attribute'=>'age',
                'contentOptions'=>['width'=>'100px']
            ],
            //'disease',
            [
                'attribute'=>'disease',
                'contentOptions'=>['width'=>'100px']
            ],
            
            [
                'attribute'=>'source',
                'contentOptions'=>['width'=>'380','class'=>'source']
            ],
            [
                'attribute' => 'huifang',
                'contentOptions'=>['width'=>'80','class'=>'source'],
                'value' => function($model){
                    return Html::a($model->huif,"#",[
                        "tabindex" => "0",
                        //"class"=>"btn btn-small btn-default",
                        "role" => "button",
                        "data-toggle"=>"popover",
                        "data-trigger"=>"focus",
                        //"title"=>"Dismissible popover", 
                        "data-placement"=>"left",
                        "data-content"=>$model->huifang
                    ]);
                },
                'format'=>'raw'
            ],
            [
                'attribute'=>'daozhen',
                'contentOptions'=>['width'=>'80'],
                'value' =>'dao'
            ],
            //'cdate',
            //[
            //    'attribute'=>'cdate',
            //    'contentOptions'=>['width'=>'180px']
            //],
            //'rdate',
            [
                'attribute'=>'rdate',
                'contentOptions'=>['width'=>'180px']
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
<?php $this->beginBlock('scyy')?>
    $(function() { 
        $("[data-toggle='popover']").popover(); 
    });
<?php $this->endBlock() ?>
<?php $this->registerJs($this->blocks['scyy']);