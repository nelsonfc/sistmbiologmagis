<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TesisTutor;

/**
 * TesisTutorSearch represents the model behind the search form about `app\models\TesisTutor`.
 */
class TesisTutorSearch extends TesisTutor
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_tesistutor', 'tipo_tutor_proyecto_id_tipo', 'tesis_id_tesis', 'profesor_id_profesor'], 'integer'],
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
        $query = TesisTutor::find();

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
            'id_tesistutor' => $this->id_tesistutor,
            'tipo_tutor_proyecto_id_tipo' => $this->tipo_tutor_proyecto_id_tipo,
            'tesis_id_tesis' => $this->tesis_id_tesis,
            'profesor_id_profesor' => $this->profesor_id_profesor,
        ]);

        return $dataProvider;
    }
}
