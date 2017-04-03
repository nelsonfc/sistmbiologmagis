<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Tesis;

/**
 * TesisSearch represents the model behind the search form about `app\models\Tesis`.
 */
class TesisSearch extends Tesis
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_tesis', 'nota_final', 'estado_tesis_id_estado', 'estudiante_id_estudiante'], 'integer'],
            [['nombre_tesis', 'financiamiento', 'fecha_rendicion'], 'safe'],
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
        $query = Tesis::find();

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
            'id_tesis' => $this->id_tesis,
            'fecha_rendicion' => $this->fecha_rendicion,
            'nota_final' => $this->nota_final,
            'estado_tesis_id_estado' => $this->estado_tesis_id_estado,
            'estudiante_id_estudiante' => $this->estudiante_id_estudiante,
        ]);

        $query->andFilterWhere(['like', 'nombre_tesis', $this->nombre_tesis])
            ->andFilterWhere(['like', 'financiamiento', $this->financiamiento]);

        return $dataProvider;
    }
}
