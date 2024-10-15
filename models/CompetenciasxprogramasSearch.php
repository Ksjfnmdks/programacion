<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Competenciasxprogramas;

/**
 * CompetenciasxprogramasSearch represents the model behind the search form of `app\models\Competenciasxprogramas`.
 */
class CompetenciasxprogramasSearch extends Competenciasxprogramas
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_rel', 'id_pro_fk', 'id_com_fk'], 'integer'],
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
        $query = Competenciasxprogramas::find();

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
            'id_rel' => $this->id_rel,
            'id_pro_fk' => $this->id_pro_fk,
            'id_com_fk' => $this->id_com_fk,
        ]);

        return $dataProvider;
    }
}
