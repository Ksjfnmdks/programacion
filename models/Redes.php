<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "redes".
 *
 * @property int $red_id
 * @property string $nombre_red
 *
 * @property Ambientes[] $ambientes
 * @property Programas[] $programas
 */
class Redes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'redes';
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
     * Gets query for [[Ambientes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAmbientes()
    {
        return $this->hasMany(Ambientes::class, ['nombre_red' => 'red_id']);
    }

    /**
     * Gets query for [[Programas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProgramas()
    {
        return $this->hasMany(Programas::class, ['red_id_FK' => 'red_id']);
    }
}
