<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Poststatus;
use common\models\User;

/* @var $this yii\web\View */
/* @var $model common\models\Post */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="post-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'tags')->textarea(['rows' => 6]) ?>

    <?php $status = Poststatus::find()
            ->select(['name','id'])
            ->indexBy('id')
            ->column();
    ?>

    <?= $form->field($model, 'status')->dropDownList($status) ?>

    <?php
        $res = User::find()->all();
        $authors = \yii\helpers\ArrayHelper::map($res,'id','username');
    ?>
    <?= $form->field($model, 'author_id')->dropDownList($authors) ?>

    <div class="form-group">
        <?= Html::submitButton('保存', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
