<?php
/**
 * User: arangda
 * Date: 2018/3/1
 * Time: 15:14
 */

namespace  backend\models;

class Upload extends \yii\db\ActiveRecord
{
    public $file;

    public function rules()
    {
        return [
            [["file"],"file"],
        ];
    }
}