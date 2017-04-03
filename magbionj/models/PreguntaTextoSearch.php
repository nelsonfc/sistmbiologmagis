<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\PreguntaTexto;

/**
 * PreguntaTextoSearch represents the model behind the search form about `app\models\PreguntaTexto`.
 */
class PreguntaTextoSearch extends PreguntaTexto
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pregunta_texto', 'encuestas_id_encuesta'], 'integer'],
            [['pregunta', 'respuesta'], 'safe'],
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
        $query = PreguntaTexto::find();

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
            'id_pregunta_texto' => $this->id_pregunta_texto,
            'encuestas_id_encuesta' => $this->encuestas_id_encuesta,
        ]);

        $query->andFilterWhere(['like', 'pregunta', $this->pregunta])
            ->andFilterWhere(['like', 'respuesta', $this->respuesta]);

        return $dataProvider;
    }
}
