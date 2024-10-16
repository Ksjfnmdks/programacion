<?php
namespace app\models;

use yii\data\ActiveDataProvider;

class ResultadoSearch extends Resultado
{
    public $searchTerm; 

    public function rules()
    {
        return [
            [['id_res', 'horas', 'id_com_fk'], 'integer'],
            [['nombre', 'fecha_creacion', 'searchTerm'], 'safe'], 
        ];
    }

    public function search($params)
    {
        $query = Resultado::find();
    
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 5, 
            ],
        ]);
    
        $this->load($params);
    

        if (!empty($this->searchTerm)) {
            $query->andFilterWhere(['or',
                ['like', 'nombre', $this->searchTerm],
                ['like', 'id_res', $this->searchTerm],
            ]);
        }
    
        return $dataProvider;
    }
}
