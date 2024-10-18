<?php

namespace app\models;

use app\models\Competencias;
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
 * @property Competencias $comFk
 * @property TblHorarios[] $tblHorarios
 */
class Resultado extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'resultados';
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
        [['id_com_fk'], 'exist', 'skipOnError' => true, 'targetClass' => Competencias::class, 'targetAttribute' => ['id_com_fk' => 'id_com']],
        ['nombre', 'unique', 'message' => 'Ya un resultado tiene este nombre.'],
        [['horas'], 'validateHoras'],
        [['horas'], 'validateHorasCompetencia'],
    ];
}

    

    public function validateHorasCompetencia($attribute, $params)
    {
        $competencia = Competencias::findOne($this->id_com_fk);

        if ($competencia) {

            $sumaHorasExistentes = Resultado::find()
                ->where(['id_com_fk' => $this->id_com_fk])
                ->sum('horas');

            $horasRestantes = $competencia->cant_horas - $sumaHorasExistentes;

            if ($horasRestantes <= 0) {
                $this->addError($attribute, 'No hay horas disponibles para esta competencia.');
                return;
            }

            if ($this->horas > $horasRestantes) {
                $this->addError($attribute,'Horas libres restantes: ' . $horasRestantes);
            }
        }
    }

    public function validateHoras($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $competencia = Competencias::findOne($this->id_com_fk);
            
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
        return $this->hasOne(Competencias::class, ['id_com' => 'id_com_fk']);
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
        return $this->hasOne(Competencias::class, ['id_com' => 'id_com_fk']);
    }
    
}
