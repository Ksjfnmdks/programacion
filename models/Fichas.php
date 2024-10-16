<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fichas".
 *
 * @property int $fic_id
 * @property string $codigo
 * @property string $fecha_incio
 * @property string $fecha_final
 * @property int $pro_id_FK
 * @property int $jor_id_FK
 * @property string $fecha_creacion
 * @property int $usu_id
 *
 * @property Horarios[] $horarios
 * @property Jornadas $jorIdFK
 * @property Programas $proIdFK
 * @property Usuarios $usu
 */
class Fichas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fichas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['codigo', 'fecha_incio', 'fecha_final', 'pro_id_FK', 'jor_id_FK', 'usu_id'], 'required'],
            [['fecha_incio', 'fecha_final', 'fecha_creacion'], 'safe'],
            [['pro_id_FK', 'jor_id_FK', 'usu_id'], 'integer'],
            [['codigo'], 'required'], // Campo requerido
            [['codigo'], 'integer'], // Solo números
            [['codigo'], 'unique', 'message' => 'Este código ya ha sido registrado.'], // Validación de unicidad
            [['pro_id_FK'], 'exist', 'skipOnError' => true, 'targetClass' => Programa::class, 'targetAttribute' => ['pro_id_FK' => 'pro_id']],
            [['jor_id_FK'], 'exist', 'skipOnError' => true, 'targetClass' => Jornadas::class, 'targetAttribute' => ['jor_id_FK' => 'jor_id']],
            [['usu_id'], 'exist', 'skipOnError' => true, 'targetClass' => Usuarios::class, 'targetAttribute' => ['usu_id' => 'usu_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'fic_id' => 'Fic ID',
            'codigo' => 'Codigo',
            'fecha_incio' => 'Fecha Incio',
            'fecha_final' => 'Fecha Final',
            'pro_id_FK' => 'Pro Id Fk',
            'jor_id_FK' => 'Jor Id Fk',
            'fecha_creacion' => 'Fecha Creacion',
            'usu_id' => 'usuario',
        ];
    }

    /**
     * Gets query for [[Horarios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getHorarios()
    {
        return $this->hasMany(Horarios::class, ['fic_id_FK' => 'fic_id']);
    }

    /**
     * Gets query for [[JorIdFK]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getJorIdFK()
    {
        return $this->hasOne(Jornadas::class, ['jor_id' => 'jor_id_FK']);
    }

    /**
     * Gets query for [[ProIdFK]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProIdFK()
    {
        return $this->hasOne(Programa::class, ['pro_id' => 'pro_id_FK']);
    }

    /**
     * Gets query for [[Usu]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsu()
    {
        return $this->hasOne(Usuarios::class, ['usu_id' => 'usu_id']);
    }
}
