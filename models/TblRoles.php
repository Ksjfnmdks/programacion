<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_roles".
 *
 * @property int $rol_id
 * @property string $nombre
 *
 * @property TblUsuarios[] $tblUsuarios
 */
class TblRoles extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_roles';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['nombre'], 'string', 'max' => 30],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'rol_id' => 'Rol ID',
            'nombre' => 'Nombre',
        ];
    }

    /**
     * Gets query for [[TblUsuarios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblUsuarios()
    {
        return $this->hasMany(TblUsuarios::class, ['rol_id_FK' => 'rol_id']);
    }
}
