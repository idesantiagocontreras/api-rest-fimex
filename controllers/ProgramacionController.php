<?php

namespace app\controllers;

use app\models\programacion\ApiProgramaciones;
use app\models\programacion\ApiProgramacionesSemana;
use Yii;

class ProgramacionController extends RestApiBaseController
{
    public $modelClass = 'app\models\programacion\programaciones';

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionProductos(){
        return ApiProgramaciones::find()->where($this->params)->andWhere($this->where)->asArray()->all();
    }

    public function actionDataSemanal(){
        return ApiProgramacionesSemana::find()->where($this->params)->andWhere($this->where)->asArray()->all();
    }

    public function actionSemanas(){
        $Semanas = [];
        $Semanas = $this->LoadSemana();
        return $Semanas;
    }

    private function LoadSemana(){
        if(!isset($this->params['Semana'])){
            $mes = date('m');
            $semana1 = $mes == 12 && date('W') == 1 ? [date('Y')+1,date('W'),date('Y-m-d')] : [date('Y'),date('W'),date('Y-m-d')];
        }else{
            $semana1 = date('Y-m-d',strtotime($this->params['Semana']));
            $mes = date('m',strtotime($semana1));

            $semana1 = $mes == 12 && date('W',strtotime($semana1)) == 1 ? [date('Y',strtotime($semana1))+1,1* date('W',strtotime($semana1)),$semana1] : [date('Y',strtotime($semana1)),1 * date('W',strtotime($semana1)),$semana1];
        }

        $TotSemanas = isset($this->params['TotSemanas']) ? $this->params['TotSemanas'] : 6;
        $Semanas[] = ['Anio'=>$semana1[0],'Semana'=>$semana1[1],'InicioSemana'=>$semana1[2]];

        for($x=0; $x < $TotSemanas; $x++){
            $Semanas[] = $this->checarSemana($Semanas[$x]);
        }
        //var_dump($semanas);exit;
        return $Semanas;
    }

    public function checarSemana($semana){
        //$ultimaSemana = date('W',strtotime($semana['Anio'].'-12-31'));
        $semana['InicioSemana'] = date('Y-m-d',strtotime('+7 day',strtotime($semana['InicioSemana'])));
        $semana['Semana'] = date('W',strtotime($semana['InicioSemana']));
        $semana['Anio'] = ($semana['Semana'] == "01" && date('m',strtotime($semana['InicioSemana'])) == 12 ? 1 : 0) + date('Y',strtotime($semana['InicioSemana'])) ;

        return $semana;
    }

}
