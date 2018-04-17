<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Register */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => '友好预约', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="register-view">

    <p>
        <?= Html::a('修改', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '你确定删除该项吗?',
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
