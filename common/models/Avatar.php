<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "avatar".
 *
 * @property int $id
 * @property int $post_id
 * @property string $avatar
 */
class Avatar extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'avatar';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['post_id', 'avatar'], 'required'],
            [['post_id'], 'integer'],
            [['avatar'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'post_id' => 'Post ID',
            'avatar' => 'Avatar',
        ];
    }
}
