<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ProfesorConAsignatura;

/**
 * ProfesorConAsignaturaSearch represents the model behind the search form about `app\models\ProfesorConAsignatura`.
 */
class ProfesorConAsignaturaSearch extends ProfesorConAsignatura
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_profesor_asignatura', 'cargo', 'asignatura_disponible_id_asignatura_disponible', 'profesor_id_profesor'], 'integer'],
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
        $query = ProfesorConAsignatura::find();

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
            'id_profesor_asignatura' => $this->id_profesor_asignatura,
            'cargo' => $this->cargo,
            'asignatura_disponible_id_asignatura_disponible' => $this->asignatura_disponible_id_asignatura_disponible,
            'profesor_id_profesor' => $this->profesor_id_profesor,
        ]);

        return $dataProvider;
    }
}
