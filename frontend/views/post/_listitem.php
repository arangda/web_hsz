<?php

use yii\helpers\Html;


?>

<div class="post">
    <div class="title">
        <h2>
            <a href="<?= $model->url; ?>">
                <?= Html::encode($model->title); ?>
            </a>
        </h2>
        <div class="author">
            <span class="glyphicon glyphicon-time" aria-hidden="true"></span>&nbsp;&nbsp;<em><?= date('Y-m-d H:i:s',$model->create_time); ?></em>
            &nbsp;&nbsp;&nbsp;&nbsp; <span class="glyphicon glyphicon-user" aria-hidden="true"></span>&nbsp;&nbsp;<em><?= Html::encode($model->author->username); ?></em>
        </div>
    </div>
    <br>
    <div class="content">
        <table>
            <tr>
                <?php if ($model->label_img): ?>
                   <td>
                       <div class="label_img">
                           <img class="img-rounded" src="<?= $model->label_img ?>"/>
                       </div>
                   </td>
                <?php endif; ?>
                <td>
                    <?= $model->beginning;?>
                </td>
            </tr>
        </table>
    </div>
    <br>
    <div class="nav">
        <span class="glyphicon glyphicon-tag" aria-hidden="true"></span>
        <?= implode(', ',$model->tagLinks);?>
        <br>
        <?= Html::a('评论('.$model->commentCount.')',$model->url.'#comments'); ?> | 最后修改于<?= date('Y-m-d H:i:s',$model->update_time); ?>
    </div>
</div>
