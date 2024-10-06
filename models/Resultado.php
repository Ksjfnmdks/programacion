<?php

namespace app\models;

use app\models\CompetenciasModel;
use yii\db\ActiveRecord;
use Yii;

/**
 * This is the model class for table "tbl_resultados".
 *
 * @property int $id_res
 * @property string $nombre
 * @property int $horas
 * @property string $fecha_creacion
 * @property int $id_com_fk
 *
 * @property CompetenciasModel $comFk
 * @property TblHorarios[] $tblHorarios
 */
class Resultado extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_resultados';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'horas', 'id_com_fk'], 'required'],
            [['horas'], 'integer', 'min' => 1],
            [['fecha_creacion'], 'safe'],
            [['id_com_fk'], 'exist', 'skipOnError' => true, 'targetClass' => CompetenciasModel::class, 'targetAttribute' => ['id_com_fk' => 'id_com']],
            [['horas'], 'validateHoras'],
        ];
    }
    
    public function validateHoras($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $competencia = CompetenciasModel::findOne($this->id_com_fk);
            
            if ($competencia && $this->horas > $competencia->cant_horas) {
                $this->addError($attribute, 'Las horas no pueden ser mayores a las horas de la competencia.');
            }
        }
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
            'id_res' => 'ID',
            'nombre' => 'Nombre',
            'horas' => 'Horas',
            'fecha_creacion' => 'Fecha Creacion',
            'id_com_fk' => 'Competencia',
        ];
    }

    /**
     * Gets query for [[ComFk]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComFk()
    {
        return $this->hasOne(CompetenciasModel::class, ['id_com' => 'id_com_fk']);
    }

    /**
     * Gets query for [[TblHorarios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblHorarios()
    {
        return $this->hasMany(TblHorarios::class, ['res_id_fk' => 'id_res']);
    }

    public function getCompetencia()
    {
        return $this->hasOne(CompetenciasModel::class, ['id_com' => 'id_com_fk']);
    }
}