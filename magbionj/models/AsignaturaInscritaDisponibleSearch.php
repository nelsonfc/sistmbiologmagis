<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\AsignaturaInscrita;

/**
 * AsignaturaInscritaDisponibleSearch represents the model behind the search form about `app\models\AsignaturaInscrita`.
 */
class AsignaturaInscritaDisponibleSearch extends AsignaturaInscrita
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_asignatura_inscrita', 'calificacion', 'estudiante_id_estudiante', 'asignatura_disponible_id_asignatura_disponible'], 'integer'],
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
        $query = AsignaturaInscrita::find();

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
            'id_asignatura_inscrita' => $this->id_asignatura_inscrita,
            'calificacion' => $this->calificacion,
            'estudiante_id_estudiante' => $this->estudiante_id_estudiante,
            'asignatura_disponible_id_asignatura_disponible' => $this->asignatura_disponible_id_asignatura_disponible,
        ]);

        return $dataProvider;
    }
}
