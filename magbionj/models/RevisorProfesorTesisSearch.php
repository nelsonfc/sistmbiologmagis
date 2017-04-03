<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\RevisorProfesorTesis;

/**
 * RevisorProfesorTesisSearch represents the model behind the search form about `app\models\RevisorProfesorTesis`.
 */
class RevisorProfesorTesisSearch extends RevisorProfesorTesis
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_revision', 'nota_oral', 'nota_escrita', 'nota_final', 'profesor_id_profesor', 'tesis_id_tesis'], 'integer'],
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
        $query = RevisorProfesorTesis::find();

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
            'id_revision' => $this->id_revision,
            'nota_oral' => $this->nota_oral,
            'nota_escrita' => $this->nota_escrita,
            'nota_final' => $this->nota_final,
            'profesor_id_profesor' => $this->profesor_id_profesor,
            'tesis_id_tesis' => $this->tesis_id_tesis,
        ]);

        return $dataProvider;
    }
}
