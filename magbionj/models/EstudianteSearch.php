<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Estudiante;

/**
 * EstudianteSearch represents the model behind the search form about `app\models\Estudiante`.
 */
class EstudianteSearch extends Estudiante
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_estudiante', 'telefono', 'movil', 'anio_ingreso', 'anio_egreso', 'situacion_academica_id_situacion', 'troncal_id_troncal'], 'integer'],
            [['rut', 'nombres', 'apellido_paterno', 'apellido_materno', 'correo', 'direccion', 'id_extranjero', 'procedencia', 'profesion', 'direccion_extranjera'], 'safe'],
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
        $query = Estudiante::find();

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
            'id_estudiante' => $this->id_estudiante,
            'telefono' => $this->telefono,
            'movil' => $this->movil,
            'anio_ingreso' => $this->anio_ingreso,
            'anio_egreso' => $this->anio_egreso,
            'situacion_academica_id_situacion' => $this->situacion_academica_id_situacion,
            'troncal_id_troncal' => $this->troncal_id_troncal,
        ]);

        $query->andFilterWhere(['like', 'rut', $this->rut])
            ->andFilterWhere(['like', 'nombres', $this->nombres])
            ->andFilterWhere(['like', 'apellido_paterno', $this->apellido_paterno])
            ->andFilterWhere(['like', 'apellido_materno', $this->apellido_materno])
            ->andFilterWhere(['like', 'correo', $this->correo])
            ->andFilterWhere(['like', 'direccion', $this->direccion])
            ->andFilterWhere(['like', 'id_extranjero', $this->id_extranjero])
            ->andFilterWhere(['like', 'procedencia', $this->procedencia])
            ->andFilterWhere(['like', 'profesion', $this->profesion])
            ->andFilterWhere(['like', 'direccion_extranjera', $this->direccion_extranjera]);

        return $dataProvider;
    }
}
