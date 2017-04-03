<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\RespuestaNumerica;

/**
 * RespuestaNumericaSearch represents the model behind the search form about `app\models\RespuestaNumerica`.
 */
class RespuestaNumericaSearch extends RespuestaNumerica
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_respuestanumero', 'valor_respuesta', 'id_preguntanumerica', 'id_ece'], 'integer'],
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
        $query = RespuestaNumerica::find();

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
            'id_respuestanumero' => $this->id_respuestanumero,
            'valor_respuesta' => $this->valor_respuesta,
            'id_preguntanumerica' => $this->id_preguntanumerica,
            'id_ece' => $this->id_ece,
        ]);

        return $dataProvider;
    }
}
