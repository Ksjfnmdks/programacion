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

    public $codigo_programa;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'competencias';
        
    }
    
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['codigo'], 'string', 'max' => 50],
            [['nombre'], 'string', 'max' => 100],
            [['descripcion'], 'string'],
            [['codigo', 'nombre', 'cant_horas', 'descripcion'], 'required'],
            [['cant_horas'], 'integer'],
            [['descripcion'], 'string'],
            [['fecha_creacion'], 'safe'],
            ['codigo', 'unique', 'message' => 'El código ya existe.'],
            ['nombre', 'unique', 'message' => 'Ya una competencia tiene este nombre.'],
            ['descripcion', 'unique', 'message' => 'Ya una competencia  tiene esta descripcion.'],
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

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);
        if ($insert && !empty($this->codigo_programa)) {
            $competenciaPrograma = new Competenciasxprogramas();
            $competenciaPrograma->id_com_fk = $this->id_com;
            $competenciaPrograma->save();
        }
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
        return $this->hasMany(Competenciasxprogramas::class, ['id_com_fk' => 'id_com']);
    }

    /**
     * Gets query for [[TblResultados]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblResultados()
    {
        return $this->hasMany(Resultados::class, ['id_com_fk' => 'id_com']);
    }

    public static function getCompetenciasList()
    {
        return self::find()->select(['nombre', 'id_com'])->indexBy('id_com')->column();
    }
    
}
