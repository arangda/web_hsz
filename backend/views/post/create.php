<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Poststatus;
use common\models\User;
use common\models\Cats;
use kartik\file\FileInput;

/* @var $this yii\web\View */
/* @var $model common\models\Post */

$this->title = '新增文章';
$this->params['breadcrumbs'][] = ['label' => '文章', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-create">


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

        <?= $form->field($model, 'avatar[]')->widget(FileInput::classname(), [
            'options' => ['multiple' => true],
        ]);?>

        <?= $form->field($model, 'content')->widget(\yii\redactor\widgets\Redactor::className()) ?>


        <?= $form->field($model, 'tags')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'status')->hiddenInput(['value' => 1])->label(false) ?>

        <?= $form->field($model, 'author_id')->hiddenInput(['value' => Yii::$app->user->id])->label(false) ?>

        <div class="form-group">
            <?= Html::submitButton('保存', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>
