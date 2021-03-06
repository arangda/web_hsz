<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Post */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => '文章管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-view">



    <p>
        <?= Html::a('修改', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute'=>'cat_id',
                'value'=>$model->cat->cat_name,
            ],
            'title',
            'label_img',
            'content:ntext',
            'tags:ntext',
            //'status',

            //'create_time:datetime',
            [
                'attribute'=>'create_time',
                'value'=>date('Y-m-d H:i:s',$model->create_time),
            ],
            //'update_time:datetime',
            [
                'attribute'=>'update_time',
                'format'=>['date','php:Y-m-d H:i:s'],
            ],
            //'author_id',
            [
                'attribute'=>'author_id',
                'value'=>$model->author->username,
            ],
            [
                'label'=>'状态',
                'value'=>$model->status0->name,
            ],
        ],
        'template'=>'<tr><th style="width:90px;">{label}</th><td>{value}</td></tr>',
    ]) ?>

</div>
