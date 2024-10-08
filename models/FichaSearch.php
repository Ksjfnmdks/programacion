<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Fichas;

/**
 * FichaSearch represents the model behind the search form of `app\models\TblFichas`.
 */
class FichaSearch extends Fichas
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fic_id', 'pro_id_FK', 'jor_id_FK'], 'integer'],
            [['codigo', 'fecha_incio', 'fecha_final', 'instructor_lider', 'fecha_creacion'], 'safe'],
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
        $query = Fichas::find();

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
            'fic_id' => $this->fic_id,
            'fecha_incio' => $this->fecha_incio,
            'fecha_final' => $this->fecha_final,
            'pro_id_FK' => $this->pro_id_FK,
            'jor_id_FK' => $this->jor_id_FK,
            'fecha_creacion' => $this->fecha_creacion,
        ]);

        $query->andFilterWhere(['like', 'codigo', $this->codigo])
            ->andFilterWhere(['like', 'instructor_lider', $this->instructor_lider]);

        return $dataProvider;
    }
}
