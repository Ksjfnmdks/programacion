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
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['usu_id', 'rol_id_FK', 'est_id_FK'], 'integer'],
            [['identificacion', 'nombre', 'apellido', 'telefono', 'correo', 'username', 'password', 'fecha_creacion'], 'safe'],
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
        $query = Usuarios::find();

        
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

        // Grid filtering conditions
        $query->andFilterWhere([
            'usu_id' => $this->usu_id,
            'fecha_creacion' => $this->fecha_creacion,
            'rol_id_FK' => $this->rol_id_FK,
            'est_id_FK' => $this->est_id_FK,
        ]);

        $query->andFilterWhere(['like', 'identificacion', $this->identificacion])
            ->andFilterWhere(['like', 'nombre', $this->nombre])
            ->andFilterWhere(['like', 'apellido', $this->apellido])
            ->andFilterWhere(['like', 'telefono', $this->telefono])
            ->andFilterWhere(['like', 'correo', $this->correo])
            ->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'password', $this->password]);

        return $dataProvider;
    }
}
