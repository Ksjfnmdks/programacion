<?php

namespace app\models;

use Yii;
use yii\db\Expression;

use yii\behaviors\TimestampBehavior;



/**
 * This is the model class for table "ambientes".
 *
 * @property int $amb_id
 * @property string $nombre_ambiente
 * @property int $capacidad
 * @property string $estado
 * @property string $recursos
 * @property int $nombre_red
 * @property string $fecha_creacion
 *
 * @property Horarios[] $horarios
 * @property Redes $nombreRed
 */
class Ambientes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'ambientes';
    }

    /**
     * {@inheritdoc}
     */

    public function behaviors(){

        return [
            [
                'class' => TimestampBehavior::class,
                'attributes' => [
                    \yii\db\ActiveRecord::EVENT_BEFORE_INSERT => ['fecha_creacion'],
                ],
                'value' => new Expression('NOW()'),
            ],
        ];
    }


    public function rules()
    {
        return [
            [['nombre_ambiente', 'capacidad', 'estado', 'recursos', 'nombre_red'], 'required'],
            [['capacidad', 'nombre_red'], 'integer'],
            [['recursos'], 'string'],
            [['fecha_creacion'], 'safe'],
            [['nombre_ambiente'], 'string', 'max' => 30],
            [['estado'], 'string', 'max' => 10],
            [['nombre_red'], 'exist', 'skipOnError' => true, 'targetClass' => Redes::class, 'targetAttribute' => ['nombre_red' => 'red_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'amb_id' => 'Amb ID',
            'nombre_ambiente' => 'Nombre Ambiente',
            'capacidad' => 'Capacidad',
            'estado' => 'Estado',
            'recursos' => 'Recursos',
            'nombre_red' => 'Nombre Red',
            'fecha_creacion' => 'Fecha Creacion',
        ];
    }

    /**
     * Gets query for [[Horarios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHorarios()
    {
        return $this->hasMany(Horarios::class, ['amb_id_FK' => 'amb_id']);
    }

    /**
     * Gets query for [[NombreRed]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRedes(){

        return $this->hasOne(Redes::className(), ['nombre_red' => 'nombre_red']);
    }

}
