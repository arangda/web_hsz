<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "register".
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
            [['tel', 'age'], 'integer'],
            [['name', 'sex', 'disease', 'cdate', 'rdate'], 'string', 'max' => 255],
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
            'name' => 'Name',
            'tel' => 'Tel',
            'sex' => 'Sex',
            'age' => 'Age',
            'disease' => 'Disease',
            'source' => 'Source',
            'cdate' => 'Cdate',
            'rdate' => 'Rdate',
        ];
    }
}
