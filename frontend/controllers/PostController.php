<?php

namespace frontend\controllers;

use common\models\Tag;
use common\models\Comment;
use common\models\User;
use Yii;
use common\models\Post;
use common\models\PostSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PostController implements the CRUD actions for Post model.
 */
class PostController extends Controller
{
    public $added=0; //0代表还没有新回复
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Post models.
     * @return mixed
     */
    public function actionIndex()
    {
        $this->getView()->title = '列表';
        $tags = Tag::findTagWeights();
        $recentComments = Comment::findRecentComments();
        $searchModel = new PostSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'tags'=>$tags,
            'recentComments'=>$recentComments,
        ]);
    }

    /**
     * Displays a single Post model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Post model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Post();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Post model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Post model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Post model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Post the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Post::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }


    public function actionDetail($id)
    {
        //step1. 准备数据模型
        $model = $this->findModel($id);
        $this->getView()->title = $model->title;
        $tags = Tag::findTagWeights();
        $recentComments = Comment::findRecentComments();


        $commentModel = new Comment();
        //step2. 当评论提交时，处理评论
        if($commentModel->load(Yii::$app->request->post()))
        {
            if(Yii::$app->user->isGuest)
            {
                Yii::$app->getSession()->setFlash('error','请登录后发表您的看法');
            }else{
                $userMe= User::findOne(Yii::$app->user->id);

                $commentModel->email = $userMe->email;
                $commentModel->user_id = $userMe->id;
                $commentModel->status = 1; //新评论默认状态为 pending
                $commentModel->post_id = $id;
                if($commentModel->save())
                {
                    $this->added=1;
                }
            }

        }

        //step3.传数据给视图渲染

        return $this->render('detail',[
           'model'=>$model,
           'tags'=>$tags,
           'recentComments'=>$recentComments,
           'commentModel'=>$commentModel,
            'added'=>$this->added,
        ]);
    }
}
