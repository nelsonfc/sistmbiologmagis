<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Profesor;

/**
 * ProfesorSearch represents the model behind the search form about `app\models\Profesor`.
 */
class ProfesorSearch extends Profesor
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_profesor', 'telefono', 'troncal_id_troncal', 'jerariquia_id_jerarquia'], 'integer'],
            [['rut', 'nombres', 'apellidos', 'correo'], 'safe'],
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
        $query = Profesor::find();

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
            'id_profesor' => $this->id_profesor,
            'telefono' => $this->telefono,
            'troncal_id_troncal' => $this->troncal_id_troncal,
            'jerariquia_id_jerarquia' => $this->jerariquia_id_jerarquia,
        ]);

        $query->andFilterWhere(['like', 'rut', $this->rut])
            ->andFilterWhere(['like', 'nombres', $this->nombres])
            ->andFilterWhere(['like', 'apellidos', $this->apellidos])
            ->andFilterWhere(['like', 'correo', $this->correo]);

        return $dataProvider;
    }
}
