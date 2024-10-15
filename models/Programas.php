<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "programas".
 *
 * @property int $pro_id
 * @property string $codigo_programa
 * @property string $nombre_programa
 * @property string $nivel_formacion
 * @property string $version
 * @property int $horas
 * @property int $meses
 * @property int $red_id_FK
 * @property string $fecha_creacion
 *
 * @property Redes $redIdFK
 */
class Programas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'programas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['codigo_programa', 'nombre_programa', 'nivel_formacion', 'version', 'horas', 'meses', 'red_id_FK'], 'required'],
            [['horas', 'meses', 'red_id_FK'], 'integer'],
            [['fecha_creacion'], 'safe'],
            [['codigo_programa'], 'string', 'max' => 8],
            [['nombre_programa'], 'string', 'max' => 100],
            [['nivel_formacion'], 'string', 'max' => 50],
            [['version'], 'string', 'max' => 2],
            [['red_id_FK'], 'exist', 'skipOnError' => true, 'targetClass' => Redes::class, 'targetAttribute' => ['red_id_FK' => 'red_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'pro_id' => 'Pro ID',
            'codigo_programa' => 'Codigo Programa',
            'nombre_programa' => 'Nombre Programa',
            'nivel_formacion' => 'Nivel Formacion',
            'version' => 'Version',
            'horas' => 'Horas',
            'meses' => 'Meses',
            'red_id_FK' => 'Red Id Fk',
            'fecha_creacion' => 'Fecha Creacion',
        ];
    }

    /**
     * Gets query for [[RedIdFK]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRedIdFK()
    {
        return $this->hasOne(Redes::class, ['red_id' => 'red_id_FK']);
    }
}
