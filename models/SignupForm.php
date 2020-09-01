<?php


namespace app\models;

use YII;
use yii\base\Exception;
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
            [['username', 'password', 'passwordRepeat'], 'required'],
            [['username'], 'string', 'min' => 4, 'max' => 16],
            [['password', 'passwordRepeat'], 'string', 'min' => 4],
            ['passwordRepeat', 'compare', 'compareAttribute' => 'password']
        ];
    }

    public function signup()
    {
        $user = new User();
        $user->username = $this->username;
        try {
            $user->password = Yii::$app->security->generatePasswordHash($this->password);
        } catch (Exception $e) {
            echo 'Exception'. $e;
        }
        try {
            $user->access_token = Yii::$app->security->generateRandomString();
        } catch (Exception $e) {
            echo 'Exception'. $e;
        }
        try {
            $user->auth_key = Yii::$app->security->generateRandomString();
        } catch (Exception $e) {
            echo 'Exception'. $e;
        }

        if ($user->save()) return true;

        YII::error("User was not saved" . VarDumper::dumpAsString($user->errors));
        return false;
    }
}