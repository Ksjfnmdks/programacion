<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

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
class Programa extends \yii\db\ActiveRecord
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
            [['horas', 'meses', 'red_id_FK'], 'integer'],
            [['horas'], 'required', 'message' => 'El campo no puede estar vacio'],
            [['meses'], 'required', 'message' => 'El campo no puede estar vacio'],
            [['fecha_creacion'], 'safe'],
            [['codigo_programa'], 'string', 'max' => 8],
            ['codigo_programa', 'unique', 'message' => 'Código existente'], // Validación de unicidad
            [['codigo_programa'], 'required', 'message' => 'El campo no puede estar vacio'],
            [['nombre_programa'], 'string', 'max' => 100],
            [['nombre_programa'], 'required', 'message' => 'El campo no puede estar vacio'],
            [['nivel_formacion'], 'string', 'max' => 50],
            [['nivel_formacion'], 'required', 'message' => 'Seleccionar un nivel de formacion'],
            [['version'], 'string', 'max' => 2],
            [['version'], 'required', 'message' => 'El campo no puede estar vacio'],
            [['red_id_FK'], 'exist', 'skipOnError' => true, 'targetClass' => Red::class, 'targetAttribute' => ['red_id_FK' => 'red_id']],
            [['red_id_FK'], 'required', 'message' => 'Seleccionar una red'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'pro_id' => 'Pro ID',
            'codigo_programa' => 'Codigo',
            'nombre_programa' => 'Programa',
            'nivel_formacion' => 'Nivel Formacion',
            'version' => 'Version',
            'horas' => 'Horas',
            'meses' => 'Meses',
            'red_id_FK' => 'Redes',
            'fecha_creacion' => 'Fecha Creacion',
        ];
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'fecha_creacion',
                'updatedAtAttribute' => false,
                'value' => new Expression('CURRENT_TIMESTAMP()'),
            ],
        ];
    }

    /**
     * Gets query for [[RedIdFK]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRed()
    {
        return $this->hasOne(Red::class, ['red_id' => 'red_id_FK']);
    }
    public function getRedIdFK()
    {
        return $this->hasOne(Red::class, ['red_id' => 'red_id_FK']);
    }
}
