<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 *
 */
class CompetenciasSearch extends CompetenciasModel
{
    public $searchTerm;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_com', 'codigo', 'cant_horas'], 'integer'],
            [['nombre', 'fecha_creacion', 'searchTerm'], 'safe'],
        ];
    }

    /**
     * C
     *
     * @param array 
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = CompetenciasModel::find();
    
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
    
        // grid filtering conditions
        $query->andFilterWhere([
            'id_com' => $this->id_com,
            'codigo' => $this->codigo,
            'cant_horas' => $this->cant_horas,
            'fecha_creacion' => $this->fecha_creacion,
        ]);
    
        // 
        if (!empty($params['searchTerm'])) {
            $searchTerm = $params['searchTerm'];
            $query->andFilterWhere(['or', 
                ['like', 'nombre', $searchTerm],
                ['like', 'codigo', $searchTerm],
            ]);
        }
    
        return $dataProvider;
    }
    
}