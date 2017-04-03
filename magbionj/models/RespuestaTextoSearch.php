<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\RespuestaTexto;

/**
 * RespuestaTextoSearch represents the model behind the search form about `app\models\RespuestaTexto`.
 */
class RespuestaTextoSearch extends RespuestaTexto
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_pregunta_texto', 'id_encuesta_con_estudiante'], 'integer'],
            [['respuesta'], 'safe'],
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
        $query = RespuestaTexto::find();

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
            'id' => $this->id,
            'id_pregunta_texto' => $this->id_pregunta_texto,
            'id_encuesta_con_estudiante' => $this->id_encuesta_con_estudiante,
        ]);

        $query->andFilterWhere(['like', 'respuesta', $this->respuesta]);

        return $dataProvider;
    }
}
