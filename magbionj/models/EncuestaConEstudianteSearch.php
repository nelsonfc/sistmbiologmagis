<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\EncuestaConEstudiante;

/**
 * EncuestaConEstudianteSearch represents the model behind the search form about `app\models\EncuestaConEstudiante`.
 */
class EncuestaConEstudianteSearch extends EncuestaConEstudiante
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_ece', 'estado', 'anio', 'semestre', 'id_encuesta', 'id_estudiante'], 'integer'],
            [['fecha_completado'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = EncuestaConEstudiante::find();

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
            'id_ece' => $this->id_ece,
            'fecha_completado' => $this->fecha_completado,
            'estado' => $this->estado,
            'anio' => $this->anio,
            'semestre' => $this->semestre,
            'id_encuesta' => $this->id_encuesta,
            'id_estudiante' => $this->id_estudiante,
        ]);

        return $dataProvider;
    }
}
