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
 * @property string $huifang
 * @property int $daozhen
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
            [['source', 'huifang'], 'string', 'max' => 500],
            [['daozhen'], 'string', 'max' => 1],
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
            'huifang' => '回访记录',
            'daozhen' => '是否到诊'
        ];
    }

    public function getDao()
    {
        $dao = "";
        if($this->daozhen == 0){
            $dao = "未到诊";
        }else{
            $dao = "已到诊";
        }
        return $dao;
    }

    public function getHuif()
    {
        $length = 2;
        $tmpStr = strip_tags($this->huifang);
        $tmpLen = mb_strlen($tmpStr);
        if($tmpLen>0){
            $tmpStr = mb_substr($tmpStr,0,$length,'utf-8');
            $tmpStr = $tmpStr.($tmpLen>$length?'...':'');
        }else{
            $tmpStr = "未回访";
        }
        return $tmpStr;
    }
}
