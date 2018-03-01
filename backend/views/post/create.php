<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\Poststatus;
use common\models\User;
use common\models\Cats;
use kartik\file\FileInput;
use yii\helpers\Url;
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

        <?= $form->field($model, 'avatar[]')->label('多张图')->widget(FileInput::classname(), [
            'options' => ['multiple' => true],
            'pluginOptions' => [
                // 需要预览的文件格式
                'previewFileType' => 'image',
                // 预览的文件
                'initialPreview' => $p1,
                // 需要展示的图片设置，比如图片的宽度等
                'initialPreviewConfig' => $p2,
                // 是否展示预览图
                'initialPreviewAsData' => true,
                // 异步上传的接口地址设置
                'uploadUrl' => Url::toRoute(['/post/async-avatar']),
                // 异步上传需要携带的其他参数，比如商品id等
                'uploadExtraData' => [
                    'post_id' => $id,
                ],
                'uploadAsync' => true,
                // 最少上传的文件个数限制
                'minFileCount' => 1,
                // 最多上传的文件个数限制
                'maxFileCount' => 10,
                // 是否显示移除按钮，指input上面的移除按钮，非具体图片上的移除按钮
                'showRemove' => true,
                // 是否显示上传按钮，指input上面的上传按钮，非具体图片上的上传按钮
                'showUpload' => true,
                //是否显示[选择]按钮,指input上面的[选择]按钮,非具体图片上的上传按钮
                'showBrowse' => true,
                // 展示图片区域是否可点击选择多文件
                'browseOnZoneClick' => true,
                // 如果要设置具体图片上的移除、上传和展示按钮，需要设置该选项
                'fileActionSettings' => [
                    // 设置具体图片的查看属性为false,默认为true
                    'showZoom' => false,
                    // 设置具体图片的上传属性为true,默认为true
                    'showUpload' => true,
                    // 设置具体图片的移除属性为true,默认为true
                    'showRemove' => true,
                ],
            ],
            // 一些事件行为
            'pluginEvents' => [
                // 上传成功后的回调方法，需要的可查看data后再做具体操作，一般不需要设置
                "fileuploaded" => "function (event, data, id, index) {
            console.log(data);
        }",
            ],
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
