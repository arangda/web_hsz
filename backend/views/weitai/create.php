<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Weitai */

$this->title = 'Create Weitai';
$this->params['breadcrumbs'][] = ['label' => 'Weitais', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="weitai-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
