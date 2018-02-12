<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "comment".
 *
 * @property int $id
 * @property string $content
 * @property int $status
 * @property int $create_time
 * @property int $user_id
 * @property string $email
 * @property string $url
 * @property int $post_id
 *
 * @property Post $post
 * @property Commentstatus $status0
 * @property User $user
 */
class Comment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['content', 'status', 'user_id', 'email', 'post_id'], 'required'],
            [['content'], 'string'],
            [['status', 'create_time', 'user_id', 'post_id'], 'integer'],
            [['email', 'url'], 'string', 'max' => 128],
            [['post_id'], 'exist', 'skipOnError' => true, 'targetClass' => Post::className(), 'targetAttribute' => ['post_id' => 'id']],
            [['status'], 'exist', 'skipOnError' => true, 'targetClass' => Commentstatus::className(), 'targetAttribute' => ['status' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'content' => '内容',
            'status' => '状态',
            'create_time' => '发布时间',
            'user_id' => '作者',
            'email' => 'Email',
            'url' => 'Url',
            'post_id' => '文章',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPost()
    {
        return $this->hasOne(Post::className(), ['id' => 'post_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getStatus0()
    {
        return $this->hasOne(Commentstatus::className(), ['id' => 'status']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return string
     * 截取评论长度
     */
    public function getBeginning()
    {
        $tmpStr = strip_tags($this->content);
        $tmpLen = mb_strlen($tmpStr);
        return mb_substr($tmpStr,0,20,'utf-8').(($tmpLen>20)?'...':'');
    }

    /**
     * @return bool
     * 评论通过审核
     */
    public function approve()
    {
        $this->status = 2;
        return ($this->save()?true:false);
    }

    /**
     * @return int|string
     * 获取待审核评论数
     */
    public static function getPengdingCommentCount()
    {
        return Comment::find()->where(['status'=>1])->count();
    }

    /**
     * 评论时间
     */
    public function beforeSave($insert)
    {
        if(parent::beforeSave($insert))
        {
            if($insert)
            {
                $this->create_time = time();
            }
            return true;
        }
        else
            return false;
    }

    public static function findRecentComments()
    {
        return Comment::find()->where(['status'=>2])->all();
    }
}
