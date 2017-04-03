<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ProyectoTutor;

/**
 * ProyectoTutorSearch represents the model behind the search form about `app\models\ProyectoTutor`.
 */
class ProyectoTutorSearch extends ProyectoTutor
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_proyectotutor', 'proyecto_tesis_id_proyecto', 'tipo_tutor_proyecto_id_tipo', 'profesor_id_profesor'], 'integer'],
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
        $query = ProyectoTutor::find();

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
            'id_proyectotutor' => $this->id_proyectotutor,
            'proyecto_tesis_id_proyecto' => $this->proyecto_tesis_id_proyecto,
            'tipo_tutor_proyecto_id_tipo' => $this->tipo_tutor_proyecto_id_tipo,
            'profesor_id_profesor' => $this->profesor_id_profesor,
            'fecha' => $this->fecha,
        ]);

        return $dataProvider;
    }
}
