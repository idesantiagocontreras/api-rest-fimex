<?php

namespace app\models\programacion;

use Yii;

/**
 * This is the model class for table "ProgramacionesSemana".
 *
 * @property int $IdProgramacionSemana
 * @property int $IdProgramacion
 * @property int $Anio
 * @property int $Semana
 * @property int $Prioridad
 * @property int $Programadas
 * @property int $Hechas
 * @property int $Llenadas
 * @property int $Cerradas
 * @property int $Vaciadas
 * @property int $IdProceso
 * @property int $IdCentroTrabajo
 * @property int $IdMaquina
 * @property int $Rechazadas
 *
 * @property EstatusMonitoreo[] $estatusMonitoreos
 * @property ProgramacionesDia[] $programacionesDias
 * @property Procesos $proceso
 * @property Programaciones $programacion
 * @property CentrosTrabajo $centroTrabajo
 * @property Maquinas $maquina
 * @property Tarimas[] $tarimas
 */
class ApiProgramacionesSemana extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'api_ProgramacionesSemana';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IdProgramacion', 'Anio', 'Semana'], 'required'],
            [['IdProgramacion', 'Anio', 'Semana', 'Prioridad', 'Programadas', 'Hechas', 'Llenadas', 'Cerradas', 'Vaciadas', 'IdProceso', 'IdCentroTrabajo', 'IdMaquina', 'Rechazadas'], 'integer'],
            [['IdProceso'], 'exist', 'skipOnError' => true, 'targetClass' => Procesos::className(), 'targetAttribute' => ['IdProceso' => 'IdProceso']],
            [['IdProgramacion'], 'exist', 'skipOnError' => true, 'targetClass' => Programaciones::className(), 'targetAttribute' => ['IdProgramacion' => 'IdProgramacion']],
            [['IdCentroTrabajo'], 'exist', 'skipOnError' => true, 'targetClass' => CentrosTrabajo::className(), 'targetAttribute' => ['IdCentroTrabajo' => 'IdCentroTrabajo']],
            [['IdMaquina'], 'exist', 'skipOnError' => true, 'targetClass' => Maquinas::className(), 'targetAttribute' => ['IdMaquina' => 'IdMaquina']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IdProgramacionSemana' => 'Id Programacion Semana',
            'IdProgramacion' => 'Id Programacion',
            'Anio' => 'Anio',
            'Semana' => 'Semana',
            'Prioridad' => 'Prioridad',
            'Programadas' => 'Programadas',
            'Hechas' => 'Hechas',
            'Llenadas' => 'Llenadas',
            'Cerradas' => 'Cerradas',
            'Vaciadas' => 'Vaciadas',
            'IdProceso' => 'Id Proceso',
            'IdCentroTrabajo' => 'Id Centro Trabajo',
            'IdMaquina' => 'Id Maquina',
            'Rechazadas' => 'Rechazadas',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstatusMonitoreos()
    {
        return $this->hasMany(EstatusMonitoreo::className(), ['IdProgramacionSemana' => 'IdProgramacionSemana']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProgramacionesDias()
    {
        return $this->hasMany(ProgramacionesDia::className(), ['IdProgramacionSemana' => 'IdProgramacionSemana']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProceso()
    {
        return $this->hasOne(Procesos::className(), ['IdProceso' => 'IdProceso']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProgramacion()
    {
        return $this->hasOne(Programaciones::className(), ['IdProgramacion' => 'IdProgramacion']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCentroTrabajo()
    {
        return $this->hasOne(CentrosTrabajo::className(), ['IdCentroTrabajo' => 'IdCentroTrabajo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMaquina()
    {
        return $this->hasOne(Maquinas::className(), ['IdMaquina' => 'IdMaquina']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTarimas()
    {
        return $this->hasMany(Tarimas::className(), ['IdProgramacionSemana' => 'IdProgramacionSemana']);
    }
}
