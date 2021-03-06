<?php
use common\models\Comment;
?>
<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?= Yii::$app->user->identity->username ?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
              <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget'=> 'tree'],
                'items' => [
                    ['label' => 'Menu Yii2', 'options' => ['class' => 'header']],
                    ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii']],
                    ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug']],
                    ['label' => 'Login', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    [

                                'label' => '管理',
                                'icon' => 'circle-o',
                                'url' => '#',
                                'items' => [
                                    //['label' => '权限管理','icon' => 'circle-o', 'url' => ['/admin']],
                                    ['label' => '评论管理','icon' => 'circle-o', 'url' => ['/comment/index']],
                                    ['label' => '用户管理', 'icon' => 'circle-o','url' => ['/user/index']],
                                    ['label' => '栏目管理', 'icon' => 'circle-o','url' => ['/cat/index']],
                                    ['label' => '文章管理', 'icon' => 'circle-o', 'url' => ['/post/index']],
                                    ['label' => '管理员', 'icon' => 'circle-o','url' => ['/adminuser/index']],
                                    ['label' => '提交管理', 'icon' => 'circle-o','url' => ['/register/index']],
                                  //  ['label' => '生成预约卡', 'icon' => 'circle-o','url' => ['/card/index']],

                        ],
                    ],
                ],
            ]
        ) ?>

    </section>

</aside>
