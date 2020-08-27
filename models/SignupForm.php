<?php


namespace app\models;

use yii\base\Model;
use yii\helpers\VarDumper;

class SignupForm extends Model
{
    public $username;
    public $password;
    public $passwordRepeat;

    public function rules()
    {
        return [
          [['username','password','passwordRepeat'], 'required'],
            [['username'], 'string' , 'min' => 4, 'max' => 16],
            [['password', 'passwordRepeat'], 'string', 'min' => 4],
            ['passwordRepeat', 'compare', 'compareAttribute' => 'password']
        ];
    }

    public function signup(){
        $user = new User();
        $user->username = $this->username;
        $user->password = \Yii::$app ->security->generatePasswordHash($this -> password);
        $user->access_token = \Yii::$app ->security->generateRandomString();
        $user->auth_key = \Yii::$app ->security->generateRandomString();

        if($user->save()) return true;

        \YII::error("User was not saved".VarDumper::dumpAsString($user->errors));
        return false;
    }
}