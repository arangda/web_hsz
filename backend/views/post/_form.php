<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Poststatus;
use backend\models\Adminuser;
use common\models\Cats;

/* @var $this yii\web\View */
/* @var $model common\models\Post */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="post-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    <?php
    $cats = Cats::find()
        ->select(['cat_name','id'])
        ->indexBy('id')
        ->column();
    ?>
    <?= $form->field($model,'cat_id')->dropDownList($cats) ?>

    <?= $form->field($model,'label_img')->widget('common\widgets\file_upload\FileUpload',[
        'config'=>[
        ]
    ]) ?>

    <?= $form->field($model, 'content')->widget(\yii\redactor\widgets\Redactor::className()) ?>


    <?= $form->field($model, 'tags')->textarea(['rows' => 6]) ?>

    <?php $status = Poststatus::find()
            ->select(['name','id'])
            ->indexBy('id')
            ->column();
    ?>

    <?= $form->field($model, 'status')->dropDownList($status) ?>

    <?php
        $res = Adminuser::find()->all();
        $authors = \yii\helpers\ArrayHelper::map($res,'id','username');
    ?>
    <?= $form->field($model, 'author_id')->dropDownList($authors) ?>

    <div class="form-group">
        <?= Html::submitButton('保存', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
