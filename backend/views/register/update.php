<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Register */

$this->title = '修改信息';
$this->params['breadcrumbs'][] = ['label' => '友好预约', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '修改';
?>
<div class="register-update">

    <?= Html::a('返回预约列表', ['index'] ,['class' => 'btn btn-info']) ?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
