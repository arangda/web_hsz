<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Weitai */

$this->title = 'Update Weitai: {nameAttribute}';
$this->params['breadcrumbs'][] = ['label' => 'Weitais', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="weitai-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
