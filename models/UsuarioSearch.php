<?php
namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Usuarios;

class UsuarioSearch extends Usuarios
{
    public $globalSearch;

    public function rules()
    {
        return [
            [['usu_id', 'rol_id_FK', 'est_id_FK'], 'integer'],
            [['identificacion', 'nombre', 'apellido', 'telefono', 'correo', 'username', 'password', 'fecha_creacion', 'globalSearch'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    /**
     * Configuración de búsqueda global reutilizable para todas las consultas
     */
    public function search($params)
    {
        $query = Usuarios::find()
            ->joinWith(['rolIdFK r', 'estIdFK e']);  // Aliases para roles y estados
    
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);
    
        $this->load($params);
    
        if (!$this->validate()) {
            return $dataProvider;
        }
    
        // Búsqueda global con los aliases correctos
        $query->orFilterWhere(['like', 'usuarios.identificacion', $this->globalSearch])
              ->orFilterWhere(['like', 'usuarios.nombre', $this->globalSearch])
              ->orFilterWhere(['like', 'usuarios.apellido', $this->globalSearch])
              ->orFilterWhere(['like', 'usuarios.correo', $this->globalSearch])
              ->orFilterWhere(['like', 'usuarios.telefono', $this->globalSearch])
              ->orFilterWhere(['like', 'usuarios.username', $this->globalSearch])
              ->orFilterWhere(['like', 'r.nombre', $this->globalSearch])  // Alias de roles
              ->orFilterWhere(['like', 'e.descripcion', $this->globalSearch]);  // Alias de estados
    
        return $dataProvider;
    }
    
}