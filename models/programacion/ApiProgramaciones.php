<?php

namespace app\models\programacion;

use Yii;

/**
 * This is the model class for table "v_Programaciones".
 *
 * @property int $IdProgramacion
 * @property int $IdPedido
 * @property int $IdArea
 * @property int $IdEmpleado
 * @property int $IdProgramacionEstatus
 * @property int $IdProducto
 * @property int $IdProductoCasting
 * @property string $OrdenCompra
 * @property int $IdAreaAct
 * @property string $AreaAct
 * @property int $Programadas
 * @property int $Hechas
 * @property string $Area
 * @property int $OE_Codigo
 * @property int $OE_Numero
 * @property string $FechaEmbarque
 * @property int $Cantidad
 * @property string $SaldoCantidad
 * @property string $TotalProgramado
 * @property string $Estatus
 * @property string $Producto
 * @property string $Descripcion
 * @property string $ProductoCasting
 * @property string $Marca
 * @property string $Presentacion
 * @property string $Aleacion
 * @property int $IdAleacion
 * @property int $Secante
 * @property int $PiezasMolde
 * @property string $CiclosMolde
 * @property int $CiclosVarel
 * @property string $PesoCasting
 * @property string $PesoArania
 * @property int $MoldesHora
 * @property int $PiezasMoldeA
 * @property string $CiclosMoldeA
 * @property string $PesoAraniaA
 * @property int $MoldesHoraA
 * @property string $Ensamble
 * @property string $FechaEnvio
 * @property string $Color
 * @property string $CodigoCliente
 * @property int $Posicion
 * @property int $IdTipoProduccion
 * @property string $ColorKamBan
 * @property string $ColorEstatus
 * @property int $IdAleacionTipo
 * @property string $AleacionTipo
 * @property string $Fecha
 * @property int $ExistenciaQuebrado
 * @property int $ExistenciaLimpieza
 * @property int $ExistenciaRack
 * @property int $ExistenciaTerminado
 * @property int $ExistenciaCasting
 * @property int $Tratamientos
 * @property int $Calidad
 * @property string $moldeoauto
 */
class ApiProgramaciones extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'api_Programaciones';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['IdProgramacion', 'IdArea', 'IdEmpleado', 'IdProgramacionEstatus', 'IdProducto', 'Programadas', 'OE_Codigo', 'OE_Numero', 'SaldoCantidad', 'TotalProgramado', 'Estatus', 'Marca', 'Secante', 'PiezasMolde', 'CiclosMolde', 'CiclosVarel', 'PesoCasting', 'PesoArania', 'PiezasMoldeA', 'CiclosMoldeA', 'PesoAraniaA'], 'required'],
            [['IdProgramacion', 'IdPedido', 'IdArea', 'IdEmpleado', 'IdProgramacionEstatus', 'IdProducto', 'IdProductoCasting', 'IdAreaAct', 'Programadas', 'Hechas', 'OE_Codigo', 'OE_Numero', 'Cantidad', 'IdAleacion', 'Secante', 'PiezasMolde', 'CiclosVarel', 'MoldesHora', 'PiezasMoldeA', 'MoldesHoraA', 'Posicion', 'IdTipoProduccion', 'IdAleacionTipo', 'ExistenciaQuebrado', 'ExistenciaLimpieza', 'ExistenciaRack', 'ExistenciaTerminado', 'ExistenciaCasting', 'Tratamientos', 'Calidad'], 'integer'],
            [['FechaEmbarque', 'FechaEnvio', 'Fecha'], 'safe'],
            [['SaldoCantidad', 'TotalProgramado', 'CiclosMolde', 'PesoCasting', 'PesoArania', 'CiclosMoldeA', 'PesoAraniaA'], 'number'],
            [['OrdenCompra', 'Estatus', 'Producto'], 'string', 'max' => 20],
            [['AreaAct', 'Marca'], 'string', 'max' => 5],
            [['Area', 'Presentacion', 'Aleacion', 'AleacionTipo'], 'string', 'max' => 30],
            [['Descripcion'], 'string', 'max' => 200],
            [['ProductoCasting', 'CodigoCliente'], 'string', 'max' => 50],
            [['Ensamble'], 'string', 'max' => 1],
            [['Color'], 'string', 'max' => 7],
            [['ColorKamBan'], 'string', 'max' => 255],
            [['ColorEstatus'], 'string', 'max' => 15],
            [['moldeoauto'], 'string', 'max' => 10],
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
            'IdProductoCasting' => 'Id Producto Casting',
            'OrdenCompra' => 'Orden Compra',
            'IdAreaAct' => 'Id Area Act',
            'AreaAct' => 'Area Act',
            'Programadas' => 'Programadas',
            'Hechas' => 'Hechas',
            'Area' => 'Area',
            'OE_Codigo' => 'Oe Codigo',
            'OE_Numero' => 'Oe Numero',
            'FechaEmbarque' => 'Fecha Embarque',
            'Cantidad' => 'Cantidad',
            'SaldoCantidad' => 'Saldo Cantidad',
            'TotalProgramado' => 'Total Programado',
            'Estatus' => 'Estatus',
            'Producto' => 'Producto',
            'Descripcion' => 'Descripcion',
            'ProductoCasting' => 'Producto Casting',
            'Marca' => 'Marca',
            'Presentacion' => 'Presentacion',
            'Aleacion' => 'Aleacion',
            'IdAleacion' => 'Id Aleacion',
            'Secante' => 'Secante',
            'PiezasMolde' => 'Piezas Molde',
            'CiclosMolde' => 'Ciclos Molde',
            'CiclosVarel' => 'Ciclos Varel',
            'PesoCasting' => 'Peso Casting',
            'PesoArania' => 'Peso Arania',
            'MoldesHora' => 'Moldes Hora',
            'PiezasMoldeA' => 'Piezas Molde A',
            'CiclosMoldeA' => 'Ciclos Molde A',
            'PesoAraniaA' => 'Peso Arania A',
            'MoldesHoraA' => 'Moldes Hora A',
            'Ensamble' => 'Ensamble',
            'FechaEnvio' => 'Fecha Envio',
            'Color' => 'Color',
            'CodigoCliente' => 'Codigo Cliente',
            'Posicion' => 'Posicion',
            'IdTipoProduccion' => 'Id Tipo Produccion',
            'ColorKamBan' => 'Color Kam Ban',
            'ColorEstatus' => 'Color Estatus',
            'IdAleacionTipo' => 'Id Aleacion Tipo',
            'AleacionTipo' => 'Aleacion Tipo',
            'Fecha' => 'Fecha',
            'ExistenciaQuebrado' => 'Existencia Quebrado',
            'ExistenciaLimpieza' => 'Existencia Limpieza',
            'ExistenciaRack' => 'Existencia Rack',
            'ExistenciaTerminado' => 'Existencia Terminado',
            'ExistenciaCasting' => 'Existencia Casting',
            'Tratamientos' => 'Tratamientos',
            'Calidad' => 'Calidad',
            'moldeoauto' => 'Moldeoauto',
        ];
    }
}
