<?php

namespace console\controllers;
/**
 * User: arangda
 * Date: 2018/2/11
 * Time: 17:00
 */

use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
    public function actionInit()
    {
        $auth = Yii::$app->authManager;

        // 添加 "createPost" 权限
        $createPost = $auth->createPermission('createPost');
        $createPost->description = '创建文章';
        $auth->add($createPost);

        // 添加 "updatePost" 权限
        $updatePost = $auth->createPermission('updatePost');
        $updatePost->description = '修改文章';
        $auth->add($updatePost);

        // 添加 "deletePost" 权限
        $deletePost = $auth->createPermission('deletePost');
        $deletePost->description = '删除文章';
        $auth->add($deletePost);

        // 添加 "approveComment" 权限
        $approveComment = $auth->createPermission('approveComment');
        $approveComment->description = '审核评论';
        $auth->add($approveComment);

        // 添加 "author" 角色并赋予 "createPost","updatePost","deletePost" 权限
        $author = $auth->createRole('author');
        $author->description = '文章管理员';
        $auth->add($author);
        $auth->addChild($author, $createPost);
        $auth->addChild($author, $updatePost);
        $auth->addChild($author, $deletePost);

        // 添加 "commentAuthor" 角色并赋予 "approveComment" 权限
        $commentAuthor = $auth->createRole('commentAuthor');
        $commentAuthor->description = '评论审查员';
        $auth->add($commentAuthor);
        $auth->addChild($commentAuthor, $approveComment);

        // 添加 "admin" 角色并赋予所有权限
        $postadmin = $auth->createRole('postadmin');
        $postadmin->description = '系统管理员';
        $auth->add($postadmin);
        $auth->addChild($postadmin, $approveComment);
        $auth->addChild($postadmin, $author);

        // 为用户指派角色。其中 1 和 2 是由 IdentityInterface::getId() 返回的id （译者注：user表的id）
        // 通常在你的 User 模型中实现这个函数。
        $auth->assign($author, 2);
        $auth->assign($commentAuthor, 3);
        $auth->assign($postadmin, 1);
    }
}