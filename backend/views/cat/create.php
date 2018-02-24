<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\cats */

$this->title = '创建栏目';
$this->params['breadcrumbs'][] = ['label' => '栏目列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cats-create">



    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
