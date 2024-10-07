<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_estados".
 *
 * @property int $est_id
 * @property string $descripcion
 *
 * @property TblUsuarios[] $tblUsuarios
 */
class TblEstados extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'estados';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['descripcion'], 'required'],
            [['descripcion'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'est_id' => 'Est ID',
            'descripcion' => 'Descripcion',
        ];
    }

    /**
     * Gets query for [[TblUsuarios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblUsuarios()
    {
        return $this->hasMany(TblUsuarios::class, ['est_id_FK' => 'est_id']);
    }
}
