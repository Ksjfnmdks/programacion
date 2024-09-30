<?php

namespace app\models;
use yii\web\IdentityInterface;
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
class Usuarios extends \yii\db\ActiveRecord implements IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tbl_usuarios';
    }

    
    public function rules()
    {
        return [
            [['identificacion', 'nombre', 'apellido', 'correo', 'username', 'password', 'fecha_creacion', 'rol_id_FK', 'est_id_FK'], 'required'],
            [['fecha_creacion'], 'safe'],
            [['rol_id_FK', 'est_id_FK'], 'integer'],
            [['identificacion', 'telefono'], 'string', 'max' => 10],
            [['nombre', 'username', 'password'], 'string', 'max' => 50],
            [['apellido', 'correo'], 'string', 'max' => 100],
            [['identificacion'], 'unique'],
            [['username', 'password'], 'unique', 'targetAttribute' => ['username', 'password']],
            [['rol_id_FK'], 'exist', 'skipOnError' => true, 'targetClass' => TblRoles::class, 'targetAttribute' => ['rol_id_FK' => 'rol_id']],
            [['est_id_FK'], 'exist', 'skipOnError' => true, 'targetClass' => TblEstados::class, 'targetAttribute' => ['est_id_FK' => 'est_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'usu_id' => 'Usu ID',
            'identificacion' => 'Identificacion',
            'nombre' => 'Nombre',
            'apellido' => 'Apellido',
            'telefono' => 'Telefono',
            'correo' => 'Correo',
            'username' => 'Username',
            'password' => 'Password',
            'fecha_creacion' => 'Fecha Creacion',
            'rol_id_FK' => 'Roles',
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
        return $this->password === $password;
    }
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    public function getId()
    {
        return $this->usu_id;
    }

    public function getAuthKey()
    {
        return null;
    }

    public function validateAuthKey($authKey)
    {
        return false;
    }

}
