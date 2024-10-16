<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Ambiente;

class AmbienteSearch extends Ambiente
{
    public $globalSearch;

    public function rules()
    {
        return [
            [['amb_id', 'capacidad'], 'integer'],
            [['nombre_ambiente', 'estado', 'recursos', 'nombre_red', 'fecha_creacion', 'globalSearch'], 'safe'],
        ];
    }

    public function search($params)
    {
        $query = Ambiente::find()->joinWith('redes');

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

        // Aplicar búsqueda global
        $query->orFilterWhere(['like', 'nombre_ambiente', $this->globalSearch])
              ->orFilterWhere(['like', 'capacidad', $this->globalSearch])
              ->orFilterWhere(['like', 'estado', $this->globalSearch])
              ->orFilterWhere(['like', 'recursos', $this->globalSearch])
              ->orFilterWhere(['like', 'redes.nombre_red', $this->globalSearch])
              ->orFilterWhere(['like', 'fecha_creacion', $this->globalSearch]);

        return $dataProvider;
    }
}