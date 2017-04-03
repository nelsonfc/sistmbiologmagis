<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SituacionConEncuesta;

/**
 * SituacionConEncuestaSearch represents the model behind the search form about `app\models\SituacionConEncuesta`.
 */
class SituacionConEncuestaSearch extends SituacionConEncuesta
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_sce', 'situacion_academica_id_situacion', 'encuestas_id_encuesta'], 'integer'],
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
        $query = SituacionConEncuesta::find();

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
            'id_sce' => $this->id_sce,
            'situacion_academica_id_situacion' => $this->situacion_academica_id_situacion,
            'encuestas_id_encuesta' => $this->encuestas_id_encuesta,
        ]);

        return $dataProvider;
    }
}
