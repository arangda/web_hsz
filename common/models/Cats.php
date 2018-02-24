<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cats".
 *
 * @property int $id
 * @property string $cat_name
 */
class Cats extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cats';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cat_name'], 'required'],
            [['cat_name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cat_name' => '栏目名称',
        ];
    }
}
