<?php

namespace app\models\programacion;

use Yii;

/**
 * This is the model class for table "Programaciones".
 *
 * @property int $IdProgramacion
 * @property int $IdPedido
 * @property int $IdArea
 * @property int $IdEmpleado
 * @property int $IdProgramacionEstatus
 * @property int $IdProducto
 * @property int $Programadas
 * @property int $Hechas
 * @property int $Cantidad
 * @property int $Llenadas
 * @property int $Cerradas
 * @property int $Vaciadas
 * @property string $FechaCerrado
 * @property string $HoraCerrado
 * @property string $CerradoPor
 * @property string $CerradoPC
 * @property string $Agrupado
 *
 * @property PedProg[] $pedProgs
 * @property ProduccionesDetalle[] $produccionesDetalles
 * @property Areas $area
 * @property Empleados $empleado
 * @property Pedidos $pedido
 * @property Productos $producto
 * @property ProgramacionesEstatus $programacionEstatus
 * @property ProgramacionesAlma[] $programacionesAlmas
 * @property ProgramacionesSemana[] $programacionesSemanas
 */
class Programaciones extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Programaciones';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IdPedido', 'IdArea', 'IdEmpleado', 'IdProgramacionEstatus', 'IdProducto', 'Programadas', 'Hechas', 'Cantidad', 'Llenadas', 'Cerradas', 'Vaciadas', 'Agrupado'], 'integer'],
            [['IdArea', 'IdEmpleado', 'IdProgramacionEstatus', 'IdProducto', 'Programadas'], 'required'],
            [['FechaCerrado', 'HoraCerrado'], 'safe'],
            [['CerradoPor', 'CerradoPC'], 'string', 'max' => 20],
            [['IdArea'], 'exist', 'skipOnError' => true, 'targetClass' => Areas::className(), 'targetAttribute' => ['IdArea' => 'IdArea']],
            [['IdEmpleado'], 'exist', 'skipOnError' => true, 'targetClass' => Empleados::className(), 'targetAttribute' => ['IdEmpleado' => 'IdEmpleado']],
            [['IdPedido'], 'exist', 'skipOnError' => true, 'targetClass' => Pedidos::className(), 'targetAttribute' => ['IdPedido' => 'IdPedido']],
            [['IdProducto'], 'exist', 'skipOnError' => true, 'targetClass' => Productos::className(), 'targetAttribute' => ['IdProducto' => 'IdProducto']],
            [['IdProgramacionEstatus'], 'exist', 'skipOnError' => true, 'targetClass' => ProgramacionesEstatus::className(), 'targetAttribute' => ['IdProgramacionEstatus' => 'IdProgramacionEstatus']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'IdProgramacion' => 'Id Programacion',
            'IdPedido' => 'Id Pedido',
            'IdArea' => 'Id Area',
            'IdEmpleado' => 'Id Empleado',
            'IdProgramacionEstatus' => 'Id Programacion Estatus',
            'IdProducto' => 'Id Producto',
            'Programadas' => 'Programadas',
            'Hechas' => 'Hechas',
            'Cantidad' => 'Cantidad',
            'Llenadas' => 'Llenadas',
            'Cerradas' => 'Cerradas',
            'Vaciadas' => 'Vaciadas',
            'FechaCerrado' => 'Fecha Cerrado',
            'HoraCerrado' => 'Hora Cerrado',
            'CerradoPor' => 'Cerrado Por',
            'CerradoPC' => 'Cerrado Pc',
            'Agrupado' => 'Agrupado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPedProgs()
    {
        return $this->hasMany(PedProg::className(), ['IdProgramacion' => 'IdProgramacion']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduccionesDetalles()
    {
        return $this->hasMany(ProduccionesDetalle::className(), ['IdProgramacion' => 'IdProgramacion']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArea()
    {
        return $this->hasOne(Areas::className(), ['IdArea' => 'IdArea']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpleado()
    {
        return $this->hasOne(Empleados::className(), ['IdEmpleado' => 'IdEmpleado']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPedido()
    {
        return $this->hasOne(Pedidos::className(), ['IdPedido' => 'IdPedido']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducto()
    {
        return $this->hasOne(Productos::className(), ['IdProducto' => 'IdProducto']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProgramacionEstatus()
    {
        return $this->hasOne(ProgramacionesEstatus::className(), ['IdProgramacionEstatus' => 'IdProgramacionEstatus']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProgramacionesAlmas()
    {
        return $this->hasMany(ProgramacionesAlma::className(), ['IdProgramacion' => 'IdProgramacion']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProgramacionesSemanas()
    {
        return $this->hasMany(ProgramacionesSemana::className(), ['IdProgramacion' => 'IdProgramacion']);
    }
}
