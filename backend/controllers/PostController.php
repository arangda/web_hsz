<?php

namespace backend\controllers;

use backend\controllers\base\baseController;
use common\models\Avatar;
use Yii;
use common\models\Post;
use common\models\PostSearch;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\Url;
use yii\web\UploadedFile;

/**
 * PostController implements the CRUD actions for Post model.
 */
class PostController extends baseController
{


    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        $bh =  [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
        return array_merge($bh,parent::behaviors());
    }
    public function actions()
    {
        return [

            'ueditor'=>[
                'class' => 'common\widgets\ueditor\UeditorAction',
                'config'=>[
                    //上传图片配置
                    'imageUrlPrefix' => Yii::$app->params['upload_url'], /* 图片访问路径前缀 */
                    'imagePathFormat' => "/images/{yyyy}{mm}{dd}/{time}{rand:6}", /* 上传保存路径,可以自定义保存路径和文件名格式 */
                ]
            ],
            'upload'=>[
                'class' => 'common\widgets\file_upload\UploadAction',     //这里扩展地址别写错
                'config' => [
                    'imageUrlPrefix' => Yii::$app->params['upload_url'], /* 图片访问路径前缀,在uploader.php中对url进行处理*/
                    'imagePathFormat' => "/images/{yyyy}{mm}{dd}/{time}{rand:6}",
                ]
            ]
        ];
    }
    /**
     * Lists all Post models.
     * @return mixed
     */
    public function actionIndex()
    {

        $searchModel = new PostSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
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
        $relationBanners = Avatar::find()->where(['post_id' => $this->id])->asArray()->all();

// @param $p1 Array 需要预览的商品图，是商品图的一个集合
// @param $p2 Array 对应商品图的操作属性，我们这里包括商品图删除的地址和商品图的id
        $p1 = $p2 = [];
        if ($relationBanners) {
            foreach ($relationBanners as $k => $v) {
                $p1[$k] = $v['avatar'];
                $p2[$k] = [
                    // 要删除商品图的地址
                    'url' => Url::toRoute('/avatar/delete'),
                    // 商品图对应的商品图id
                    'key' => $v['id'],
                ];
            }
        }



        $model = new Post();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {


            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'p1' => $p1,
            'p2' => $p2,
            // 商品id
            'id' => $model->id,
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

    public function actionAsyncAvatar ()
    {

        // 商品ID
        $id = Yii::$app->request->post('post_id');

        // $p1 $p2是我们处理完图片之后需要返回的信息，其参数意义可参考上面的讲解
        $p1 = $p2 = [];


        // 如果没有商品图或者商品id非真，返回空
        if (empty($_FILES['Post']['name']) || empty($_FILES['Post']['name']['avatar']) || !$id) {
            echo '{}';
            return;
        }

        // 循环多张商品banner图进行上传和上传后的处理
        for ($i = 0; $i < count($_FILES['Post']['name']['avatar']); $i++) {
            // 上传之后的商品图是可以进行删除操作的，我们为每一个商品成功的商品图指定删除操作的地址
            $url = '/avatar/delete';

            // 调用图片接口上传后返回的图片地址，注意是可访问到的图片地址哦
            $ext = strrchr($_FILES['Post']['name']['avatar'][$i],'.');
            $destDir = Yii::getAlias("@webroot")."/images/" .date('Ymd');
            if(!file_exists($destDir)){
                mkdir($destDir);
            }
            $dest = $destDir.'/'.mt_rand(0,1000000).$ext;
            move_uploaded_file($_FILES['Post']['tmp_name']['avatar'][$i],$dest);



            $imageUrl = Yii::$app->params['upload_url'].'/'.date('Ymdhis').'/'.mt_rand(0,1000000).$ext;

            // 保存商品avatar图信息
            $m = new Avatar();
            $m->post_id = $id;
            $m->avatar = $imageUrl;
            $key = 0;
            if ($m->save(false)) {
                $key = $m->id;
            }

            // 这是一些额外的其他信息，如果你需要的话
            // $pathinfo = pathinfo($imageUrl);
            // $caption = $pathinfo['basename'];
            // $size = $_FILES['Banner']['size']['banner_url'][$i];


            $p1[$i] = $imageUrl;
            $p2[$i] = ['url' => $url, 'key' => $key];
        }


        // 返回上传成功后的商品图信息
        echo json_encode([
            'initialPreview' => $p1,
            'initialPreviewConfig' => $p2,
            'append' => true,
        ]);
        return;
    }

}
