<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_ambientes".
 *
 * @property int $amb_id
 * @property string $nombre_ambiente
 * @property string $descripcion
 * @property string $fecha_creacion
 *
 * @property TblHorarios[] $tblHorarios
 */
class Ambientes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_ambientes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre_ambiente', 'descripcion'], 'required'],
            [['fecha_creacion'], 'safe'],
            [['nombre_ambiente'], 'string', 'max' => 30],
            [['descripcion'], 'string', 'max' => 300],
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
            'descripcion' => 'Descripcion',
            'fecha_creacion' => 'Fecha Creacion',
        ];
    }

    /**
     * Gets query for [[TblHorarios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblHorarios()
    {
        return $this->hasMany(TblHorarios::class, ['amb_id_FK' => 'amb_id']);
    }
}
