<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Poststatus;
use common\models\User;
use common\models\Cats;

/* @var $this yii\web\View */
/* @var $model common\models\Post */

$this->title = '新增文章';
$this->params['breadcrumbs'][] = ['label' => '文章', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-create">

    <h1><?= Html::encode($this->title) ?></h1>

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
        <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

        <?= $form->field($model, 'tags')->textarea(['rows' => 6]) ?>


        <div class="form-group">
            <?= Html::submitButton('保存', ['class' => 'btn btn-success']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>
