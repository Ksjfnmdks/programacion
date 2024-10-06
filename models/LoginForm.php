<?php

namespace app\models;

use Yii;
use yii\base\Model;
use app\models\TblUsuarios;

class LoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe = true;

    private $_user = false;

    public function rules()
    {
        return [
            ['username', 'required', 'message' => 'Debe ingresar un usuario.'],
            ['password', 'required', 'message' => 'Debe ingresar una contraseña.'],
            ['password', 'validatePassword'],
        ];
    }

    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'Usuario o Contraseña incorrectos.');
            }
        }
    }

    public function getUser()
    {
        if ($this->_user === false) {
            $this->_user = TblUsuarios::findOne(['username' => $this->username]);
        }

        return $this->_user;
    }

    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        }
        return false;
    }
}
