<?php
namespace backend\models;

use yii\base\Model;
use backend\models\Adminuser;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $nickname;
    public $password_repeat;
    public $profile;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => 'backend\models\Adminuser', 'message' => '用户名已存在.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => 'backend\models\Adminuser', 'message' => '邮件地址已存在.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
            ['password_repeat','compare','compareAttribute'=>'password','message'=>'两次输入密码不一致'],
            ['nickname','required'],
            ['nickname','string','max'=>128],

            ['profile','string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'username' => '用户名',
            'nickname' => '昵称',
            'password'=>'密码',
            'password_repeat'=>'重输密码',
            'email' => 'Email',
            'profile' => '简介',
        ];
    }
    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new Adminuser();
        $user->username = $this->username;
        $user->nickname = $this->nickname;
        $user->email = $this->email;
        $user->profile = $this->profile;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        
        return $user->save() ? $user : null;
    }
}
