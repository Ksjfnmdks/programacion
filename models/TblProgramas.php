<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_programas".
 *
 * @property int $pro_id
 * @property string $nombre_programa
 * @property int $red_id_FK
 * @property string $fecha_creacion
 *
 * @property TblRedes $redIdFK
 * @property TblCompetenciasProgramas[] $tblCompetenciasProgramas
 * @property TblFichas[] $tblFichas
 */
class TblProgramas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_programas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre_programa', 'red_id_FK'], 'required'],
            [['red_id_FK'], 'integer'],
            [['fecha_creacion'], 'safe'],
            [['nombre_programa'], 'string', 'max' => 100],
            [['red_id_FK'], 'exist', 'skipOnError' => true, 'targetClass' => TblRedes::class, 'targetAttribute' => ['red_id_FK' => 'red_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'pro_id' => 'Pro ID',
            'nombre_programa' => 'Nombre Programa',
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
        return $this->hasOne(TblRedes::class, ['red_id' => 'red_id_FK']);
    }

    /**
     * Gets query for [[TblCompetenciasProgramas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblCompetenciasProgramas()
    {
        return $this->hasMany(TblCompetenciasProgramas::class, ['id_pro_fk' => 'pro_id']);
    }

    /**
     * Gets query for [[TblFichas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblFichas()
    {
        return $this->hasMany(TblFichas::class, ['pro_id_FK' => 'pro_id']);
    }
}
