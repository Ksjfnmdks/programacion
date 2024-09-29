<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_jornadas".
 *
 * @property int $jor_id
 * @property string $descripcion
 * @property string $hora_inicio
 * @property string $hora_fin
 * @property string $fecha_creacion
 *
 * @property TblFichas[] $tblFichas
 */
class Jornadas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_jornadas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['descripcion', 'hora_inicio', 'hora_fin'], 'required'],
            [['fecha_creacion'], 'safe'],
            [['descripcion'], 'string', 'max' => 100],
            [['hora_inicio', 'hora_fin'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'jor_id' => 'Jor ID',
            'descripcion' => 'Descripcion',
            'hora_inicio' => 'Hora Inicio',
            'hora_fin' => 'Hora Fin',
            'fecha_creacion' => 'Fecha Creacion',
        ];
    }

    /**
     * Gets query for [[TblFichas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblFichas()
    {
        return $this->hasMany(TblFichas::class, ['jor_id_FK' => 'jor_id']);
    }
}
