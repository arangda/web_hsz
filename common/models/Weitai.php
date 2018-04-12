<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "weitai".
 *
 * @property int $id
 * @property string $name
 * @property string $tel
 * @property string $sex
 * @property int $age
 * @property string $disease
 * @property string $source
 * @property string $cdate
 * @property string $rdate
 */
class Weitai extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'weitai';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'tel'], 'required'],
            [['tel','age'], 'integer'],
            [['name','sex','disease', 'cdate', 'rdate'], 'string', 'max' => 255],
            [['source'], 'string', 'max' => 500],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '姓名',
            'tel' => '电话',
            'sex' => '性别',
            'age' => '年龄',
            'disease' => '疾病描述',
            'source' => '来源',
            'cdate' => '预约时间',
            'rdate' => '登记时间',
        ];
    }
}
