<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Fichas;

class FichasSearch extends Fichas
{
    public $globalSearch;

    public function rules()
    {
        return [
            [['fic_id', 'pro_id_FK', 'jor_id_FK', 'usu_id'], 'integer'],
            [['codigo', 'fecha_incio', 'fecha_final', 'fecha_creacion', 'instructor_lider', 'globalSearch'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function search($params)
    {
        $query = Fichas::find()
            ->joinWith(['proIdFK', 'jorIdFK', 'usu']);  // Join para acceder a campos relacionados

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 4, // Tamaño de página
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        // Búsqueda global: filtro en múltiples columnas usando `orFilterWhere`
        $query->orFilterWhere(['like', 'fichas.codigo', $this->globalSearch])
              ->orFilterWhere(['like', 'instructor_lider', $this->globalSearch])
              ->orFilterWhere(['like', 'fecha_incio', $this->globalSearch])
              ->orFilterWhere(['like', 'fecha_final', $this->globalSearch])
              ->orFilterWhere(['like', 'fichas.fecha_creacion', $this->globalSearch])
              ->orFilterWhere(['like', 'programas.nombre_programa', $this->globalSearch]) // Asumiendo que el programa tiene un campo `nombre`
              ->orFilterWhere(['like', 'jornadas.descripcion', $this->globalSearch])  // Asumiendo que la jornada tiene un campo `nombre`
              ->orFilterWhere(['like', 'usuarios.nombre', $this->globalSearch]); // Buscando por nombre del usuario líder

        return $dataProvider;
    }
}
