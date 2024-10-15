<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "competenciasxprogramas".
 *
 * @property int $id_rel
 * @property int $id_pro_fk
 * @property int $id_com_fk
 *
 * @property Competencia $comFk
 * @property Programa $proFk
 */
class Competenciasxprogramas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'competenciasxprogramas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pro_fk', 'id_com_fk'], 'required'],
            [['id_pro_fk', 'id_com_fk'], 'integer'],
            [['id_com_fk'], 'exist', 'skipOnError' => true, 'targetClass' => Competencias::class, 'targetAttribute' => ['id_com_fk' => 'id_com']],
            [['id_pro_fk'], 'exist', 'skipOnError' => true, 'targetClass' => Programa::class, 'targetAttribute' => ['id_pro_fk' => 'pro_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_rel' => 'Id Rel',
            'id_pro_fk' => 'Programa',
            'id_com_fk' => 'Competencia',
        ];
    }

    /**
     * Gets query for [[ComFk]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCompetencia()
    {
        return $this->hasOne(Competencias::class, ['id_com' => 'id_com_fk']);
    }
    public function getComFk()
    {
        return $this->hasOne(Competencias::class, ['id_com' => 'id_com_fk']);
    }

    /**
     * Gets query for [[ProFk]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPrograma()
    {
        return $this->hasOne(Programa::class, ['pro_id' => 'id_pro_fk']);
    }
    public function getProFk()
    {
        return $this->hasOne(Programa::class, ['pro_id' => 'id_pro_fk']);
    }
}
