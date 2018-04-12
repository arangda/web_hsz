<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Weitai */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => '胃泰预约', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="weitai-view">



    <p>
        <?= Html::a('修改', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
        <?= Html::a('返回预约列表', ['index'] ,['class' => 'btn btn-info']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'tel',
            'sex',
            'age',
            'disease',
            'source',
            'cdate',
            'rdate',
        ],
    ]) ?>

</div>
