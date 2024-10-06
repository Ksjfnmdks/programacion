<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_competencias".
 *
 * @property int $id_com
 * @property string $nombre
 * @property int $cant_horas
 * @property string $fecha_creacion
 *
 * @property TblCompetenciasProgramas[] $tblCompetenciasProgramas
 * @property Resultado[] $tblResultados
 */
class CompetenciasModel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_competencias';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'cant_horas', 'codigo', 'descripcion'], 'required'],
            [['cant_horas'], 'integer'],
            [['codigo'], 'string', 'max' => 50],
            [['fecha_creacion'], 'safe'],
            [['nombre'], 'string', 'max' => 100],
            [['descripcion'], 'string', 'max' => 100],
        ];
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($insert) {
                $this->fecha_creacion = Yii::$app->formatter->asDatetime('now', 'php:Y-m-d H:i:s');
            }
            return true;
        }
        return false;
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_com' => 'ID',
            'codigo' => 'Codigo',
            'nombre' => 'Nombre',
            'cant_horas' => 'Cantidad Horas',
            'fecha_creacion' => 'Fecha Creacion',
            'descripcion' => 'Descripcion',
        ];
    }

    /**
     * Gets query for [[TblCompetenciasProgramas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblCompetenciasProgramas()
    {
        return $this->hasMany(TblCompetenciasProgramas::class, ['id_com_fk' => 'id_com']);
    }

    /**
     * Gets query for [[TblResultados]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblResultados()
    {
        return $this->hasMany(Resultado::class, ['id_com_fk' => 'id_com']);
    }

    public static function getCompetenciasList()
    {
        return self::find()->select(['nombre', 'id_com'])->indexBy('id_com')->column();
    }
}
