<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "register".
 *
 * @property int $id
 * @property string $name
 * @property string $tel
 * @property string $disease
 * @property string $cdate
 */
class Register extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'register';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'tel'], 'required'],
            [['tel'], 'integer'],
            [['name', 'disease', 'cdate'], 'string', 'max' => 255],
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
            'disease' => '疾病',
            'cdate' => '预约时间',
        ];
    }
}
