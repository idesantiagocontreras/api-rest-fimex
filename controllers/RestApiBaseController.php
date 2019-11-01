<?php

namespace app\controllers;

use Yii;
use yii\filters\auth\HttpBearerAuth;

class RestApiBaseController extends \yii\rest\ActiveController
{
    public $params = [];
    public $where = [];

    public function behaviors() {
        $behaviors = parent::behaviors();

        /*$behaviors['authenticator'] = [
            'class' => HttpBasicAuth::className(),
            'auth' => ['username', 'password']
        ];*/

        // add CORS filter
        $behaviors['corsFilter'] = [
            'class' => \yii\filters\Cors::className(),
        ];

        $behaviors['authenticator'] = [
            'class' => HttpBearerAuth::className(),
            'except' => ['options', 'login'],
        ];

        return $behaviors;
    }

    function init() {

        //Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        if(Yii::$app->request->post()){
            $this->params = Yii::$app->request->post();
        }

        if(Yii::$app->request->get()){
            $this->params = Yii::$app->request->get();
        }

        if(isset($this->params['where'])){
            $where = json_decode($this->params['where'],true);
            foreach($where as $key => $value){
                $this->where[] = "$key LIKE '%$value%'";
            }
            $this->where = implode(" AND ",$this->where);
            unset($this->params['where']);
        }
    }

    function isJson($string) {
        json_decode($string);
        return (json_last_error() == JSON_ERROR_NONE);
    }

}
