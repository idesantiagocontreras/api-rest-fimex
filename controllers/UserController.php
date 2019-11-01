<?php

namespace app\controllers;

use Yii;
use app\models\LoginForm;

class UserController extends RestApiBaseController {
    public $modelClass = 'app\models\User';
    public $enableCsrfValidation = false;

    public function actionAuthenticate(){
        $model = new LoginForm();
        if ($model->load(['LoginForm' =>$this->params]) && $model->login()) {
            return [
                'token' => Yii::$app->user->identity->getUniqueAccessToken()
            ];
        }else{
            return json_encode([
                'mensaje' => "Usuario o contraseña incorrecta",
                'tipo'=> "danger"
            ]);
        }
    }

    public function actionLogin() {
        $model = new LoginForm();
        if ($model->load(['LoginForm' =>$this->params]) && $model->login()) {
            return [
                'token' => Yii::$app->user->identity->getUniqueAccessToken()
            ];
        }else{
            return json_encode([
                'mensaje' => "Usuario o contraseña incorrecta",
                'tipo'=> "danger"
            ]);
        }
    }
}
