<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Avatar */

$this->title = 'Create Avatar';
$this->params['breadcrumbs'][] = ['label' => 'Avatars', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="avatar-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']])?>
    <?= $form->field($model,'file')->fileInput() ?>
    <button>提交</button>
    <?php ActiveForm::end() ?>

</div>
