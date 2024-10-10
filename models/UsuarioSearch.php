<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Usuarios;

/**
 * UsuarioSearch represents the model behind the search form of `app\models\TblUsuarios`.
 */
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
    

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params, $role = null)
    {
        $query = Usuarios::find()
            ->joinWith(['rolIdFK', 'estIdFK']);
    
        if ($role === 'instructor') {
            $query->where(['rol_id_FK' => '2']);
        }
    
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 5,
            ],
        ]);
    
        $this->load($params);
    
        if (!$this->validate()) {
            return $dataProvider;
        }
    
        $query->orFilterWhere(['like', 'usuarios.identificacion', $this->globalSearch]) 
              ->orFilterWhere(['like', 'usuarios.nombre', $this->globalSearch])
              ->orFilterWhere(['like', 'usuarios.apellido', $this->globalSearch])
              ->orFilterWhere(['like', 'usuarios.telefono', $this->globalSearch]) 
              ->orFilterWhere(['like', 'usuarios.correo', $this->globalSearch])
              ->orFilterWhere(['like', 'usuarios.username', $this->globalSearch]) 
              ->orFilterWhere(['like', 'usuarios.password', $this->globalSearch]) 
              ->orFilterWhere(['like', 'roles.nombre', $this->globalSearch]) 
              ->orFilterWhere(['like', 'estados.descripcion', $this->globalSearch]); 
    
        return $dataProvider;
    }
}
