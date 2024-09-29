<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_fichas".
 *
 * @property int $fic_id
 * @property string $codigo
 * @property string $fecha_incio
 * @property string $fecha_final
 * @property int $pro_id_FK
 * @property string $instructor_lider
 * @property int $jor_id_FK
 * @property string $fecha_creacion
 *
 * @property TblJornadas $jorIdFK
 * @property TblProgramas $proIdFK
 * @property TblHorarios[] $tblHorarios
 */
class TblFichas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_fichas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['codigo', 'fecha_incio', 'fecha_final', 'pro_id_FK', 'instructor_lider', 'jor_id_FK'], 'required'],
            [['fecha_incio', 'fecha_final', 'fecha_creacion'], 'safe'],
            [['pro_id_FK', 'jor_id_FK'], 'integer'],
            [['codigo'], 'string', 'max' => 10],
            [['instructor_lider'], 'string', 'max' => 100],
            [['pro_id_FK'], 'exist', 'skipOnError' => true, 'targetClass' => TblProgramas::class, 'targetAttribute' => ['pro_id_FK' => 'pro_id']],
            [['jor_id_FK'], 'exist', 'skipOnError' => true, 'targetClass' => TblJornadas::class, 'targetAttribute' => ['jor_id_FK' => 'jor_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'fic_id' => 'Fic ID',
            'codigo' => 'Codigo',
            'fecha_incio' => 'Fecha Incio',
            'fecha_final' => 'Fecha Final',
            'pro_id_FK' => 'Pro Id Fk',
            'instructor_lider' => 'Instructor Lider',
            'jor_id_FK' => 'Jor Id Fk',
            'fecha_creacion' => 'Fecha Creacion',
        ];
    }

    /**
     * Gets query for [[JorIdFK]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getJorIdFK()
    {
        return $this->hasOne(TblJornadas::class, ['jor_id' => 'jor_id_FK']);
    }

    /**
     * Gets query for [[ProIdFK]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProIdFK()
    {
        return $this->hasOne(TblProgramas::class, ['pro_id' => 'pro_id_FK']);
    }

    /**
     * Gets query for [[TblHorarios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblHorarios()
    {
        return $this->hasMany(TblHorarios::class, ['fic_id_FK' => 'fic_id']);
    }
}
