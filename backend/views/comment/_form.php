<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Commentstatus;

/* @var $this yii\web\View */
/* @var $model common\models\Comment */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="comment-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?php
        $status = Commentstatus::find()
            ->select(['name','id'])
            ->indexBy('id')
            ->column();
    ?>

    <?= $form->field($model, 'status')->dropDownList($status) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('保存', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
