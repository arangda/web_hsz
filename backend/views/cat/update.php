<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\cats */

$this->title = 'Update Cats: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => '栏目列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '修改';
?>
<div class="cats-update">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
