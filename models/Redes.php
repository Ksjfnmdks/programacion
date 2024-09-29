<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_redes".
 *
 * @property int $red_id
 * @property string $nombre_red
 *
 * @property TblProgramas[] $tblProgramas
 */
class Redes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_redes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre_red'], 'required'],
            [['nombre_red'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'red_id' => 'Red ID',
            'nombre_red' => 'Nombre Red',
        ];
    }

    /**
     * Gets query for [[TblProgramas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblProgramas()
    {
        return $this->hasMany(TblProgramas::class, ['red_id_FK' => 'red_id']);
    }
}
