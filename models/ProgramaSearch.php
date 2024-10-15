<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Programa;

/**
 * ProgramaSearch represents the model behind the search form of `app\models\Programa`.
 */
class ProgramaSearch extends Programa
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pro_id', 'horas', 'meses', 'red_id_FK'], 'integer'],
            [['codigo_programa', 'nombre_programa', 'nivel_formacion', 'version', 'fecha_creacion'], 'safe'],
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
        $query = Programa::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 5,
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'pro_id' => $this->pro_id,
            'horas' => $this->horas,
            'meses' => $this->meses,
            'red_id_FK' => $this->red_id_FK,
            'fecha_creacion' => $this->fecha_creacion,
        ]);

        $query->andFilterWhere(['like', 'nombre_programa', $this->nombre_programa])
            ->andFilterWhere(['like', 'codigo_programa', $this->codigo_programa])
            ->andFilterWhere(['like', 'nivel_formacion', $this->nivel_formacion])
            ->andFilterWhere(['like', 'version', $this->version]);

        return $dataProvider;
    }
}
