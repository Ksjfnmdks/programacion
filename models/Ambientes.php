<?php

namespace app\models;

use Yii;
use yii\db\Expression;
use yii\behaviors\TimestampBehavior;

class Ambientes extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'tbl_ambientes';
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'attributes' => [
                    \yii\db\ActiveRecord::EVENT_BEFORE_INSERT => ['fecha_creacion'],
                ],
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    public function beforeSave($insert)
    {
        if (!parent::beforeSave($insert)) {
            return false;
        }

        if ($insert) {
            $this->fecha_creacion = new Expression('NOW()');
        } else {
            // Preserva la fecha de creación en actualizaciones
            $this->fecha_creacion = $this->getOldAttribute('fecha_creacion');
        }

        return true;
    }

    public function rules()
    {
        return [
            [['nombre_ambiente', 'descripcion'], 'required'],
            [['fecha_creacion'], 'safe'],
            [['nombre_ambiente'], 'string', 'max' => 30],
            [['descripcion'], 'string', 'max' => 300],
        ];
    }

    public function attributeLabels()
    {
        return [
            'amb_id' => 'Amb ID',
            'nombre_ambiente' => 'Nombre Ambiente',
            'descripcion' => 'Descripcion',
            'fecha_creacion' => 'Fecha Creacion',
        ];
    }

    public function getTblHorarios()
    {
        return $this->hasMany(TblHorarios::class, ['amb_id_FK' => 'amb_id']);
    }
}
