<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\AvanceProyecto;

/**
 * AvanceProyectoSearch represents the model behind the search form about `app\models\AvanceProyecto`.
 */
class AvanceProyectoSearch extends AvanceProyecto
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_avance', 'porcentaje', 'proyecto_tesis_id_proyecto', 'tesis_id_tesis'], 'integer'],
            [['fecha'], 'safe'],
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
        $query = AvanceProyecto::find();

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
            'id_avance' => $this->id_avance,
            'porcentaje' => $this->porcentaje,
            'fecha' => $this->fecha,
            'proyecto_tesis_id_proyecto' => $this->proyecto_tesis_id_proyecto,
            'tesis_id_tesis' => $this->tesis_id_tesis,
        ]);

        return $dataProvider;
    }
}
