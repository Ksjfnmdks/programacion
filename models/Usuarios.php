<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_usuarios".
 *
 * @property int $usu_id
 * @property string $identificacion
 * @property string $nombre
 * @property string $apellido
 * @property string|null $telefono
 * @property string $correo
 * @property string $username
 * @property string $password
 * @property string $fecha_creacion
 * @property int $rol_id_FK
 * @property int $est_id_FK
 *
 * @property TblEstados $estIdFK
 * @property TblRoles $rolIdFK
 * @property TblHorarios[] $tblHorarios
 */
class Usuarios extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_usuarios';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['identificacion', 'nombre', 'apellido', 'correo', 'username', 'password', 'rol_id_FK', 'est_id_FK'], 'required'],
            [['fecha_creacion'], 'safe'],
            [['rol_id_FK', 'est_id_FK'], 'integer'],
            [['identificacion', 'telefono'], 'string', 'max' => 10],
            [['nombre', 'username', 'password'], 'string', 'max' => 50],
            [['apellido', 'correo'], 'string', 'max' => 100],
            [['identificacion'], 'unique'],
            [['username', 'password'], 'unique', 'targetAttribute' => ['username', 'password']],
            [['rol_id_FK'], 'exist', 'skipOnError' => true, 'targetClass' => Roles::class, 'targetAttribute' => ['rol_id_FK' => 'rol_id']],
            [['est_id_FK'], 'exist', 'skipOnError' => true, 'targetClass' => Estados::class, 'targetAttribute' => ['est_id_FK' => 'est_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'usu_id' => 'Usu ID',
            'identificacion' => 'Identificación',
            'nombre' => 'Nombres',
            'apellido' => 'Apellidos',
            'telefono' => 'Telefono',
            'correo' => 'Correo electornico',
            'username' => 'Usuario',
            'password' => 'Contraseña',
            'fecha_creacion' => 'Fecha Creacion',
            'rol_id_FK' => 'Asignar Rol',
            'est_id_FK' => 'Estado',
        ];
    }

    /**
     * Gets query for [[EstIdFK]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstIdFK()
    {
        return $this->hasOne(Estados::class, ['est_id' => 'est_id_FK']);
    }

    /**
     * Gets query for [[RolIdFK]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRolIdFK()
    {
        return $this->hasOne(Roles::class, ['rol_id' => 'rol_id_FK']);
    }

    /**
     * Gets query for [[TblHorarios]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTblHorarios()
    {
        return $this->hasMany(TblHorarios::class, ['usu_id_FK' => 'usu_id']);
    }
    public function validatePassword($password)
    {
        // Comparación directa de la contraseña (sin hashing).
        return $this->password === $password;
    }
}
