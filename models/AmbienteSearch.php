<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Ambientes;

/**
 * AmbienteSearch represents the model behind the search form of `app\models\Ambiente`.
 */
class AmbienteSearch extends Ambientes
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['amb_id', 'capacidad', 'nombre_red'], 'integer'],
            [['nombre_ambiente', 'estado', 'recursos', 'fecha_creacion'], 'safe'],
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
    public function search($params)
    {
        $query = Ambientes::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'amb_id' => $this->amb_id,
            'capacidad' => $this->capacidad,
            'nombre_red' => $this->nombre_red,
            'fecha_creacion' => $this->fecha_creacion,
        ]);

        $query->andFilterWhere(['like', 'nombre_ambiente', $this->nombre_ambiente])
            ->andFilterWhere(['like', 'estado', $this->estado])
            ->andFilterWhere(['like', 'recursos', $this->recursos]);

        return $dataProvider;
    }
}
