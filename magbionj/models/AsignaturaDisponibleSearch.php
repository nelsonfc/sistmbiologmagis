<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\AsignaturaDisponible;

/**
 * AsignaturaDisponibleSearch represents the model behind the search form about `app\models\AsignaturaDisponible`.
 */
class AsignaturaDisponibleSearch extends AsignaturaDisponible
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_asignatura_disponible', 'anio', 'semestre', 'asignatura_id_asignatura', 'profesor'], 'integer'],
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
        $query = AsignaturaDisponible::find();

        // add conditions that should always apply here

        $this->load($params);
        if(!empty($this->profesor)){
            $i = 0;
            $profes = '';
            foreach(ProfesorConAsignatura::find()->where(['profesor_id_profesor' => $this->profesor])->all() as $profesor){
                $profes[$i] = $profesor->asignatura_disponible_id_asignatura_disponible;
                $i++;
            }
            $dataProvider = new ActiveDataProvider([
                'query' => $query->where(['id_asignatura_disponible' => $profes]),
            ]);
        }else{
            $dataProvider = new ActiveDataProvider([
                'query' => $query,
            ]);
        }
        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_asignatura_disponible' => $this->id_asignatura_disponible,
            'anio' => $this->anio,
            'semestre' => $this->semestre,
            'asignatura_id_asignatura' => $this->asignatura_id_asignatura,
        ]);

        return $dataProvider;
    }
}
