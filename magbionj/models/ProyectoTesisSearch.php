<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ProyectoTesis;

/**
 * ProyectoTesisSearch represents the model behind the search form about `app\models\ProyectoTesis`.
 */
class ProyectoTesisSearch extends ProyectoTesis
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_proyecto', 'nota_final', 'estudiante_id_estudiante', 'estado_tesis_id_estado'], 'integer'],
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
    public function search($params, $id)
    {
        $query = ProyectoTesis::find()->where(['estudiante_id_estudiante' =>$id]);

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
            'id_proyecto' => $this->id_proyecto,
            'nota_final' => $this->nota_final,
            'estudiante_id_estudiante' => $this->estudiante_id_estudiante,
            'estado_tesis_id_estado' => $this->estado_tesis_id_estado,
        ]);
        if(!empty($this->fecha_rendicion)){
            $this->fecha_rendicion = date("Y-m-d", strtotime($this->fecha_rendicion));
        }
        $query->andFilterWhere(['like', 'nombre_tesis', $this->nombre_tesis])
            ->andFilterWhere(['like', 'financiamiento', $this->financiamiento])
        ->andFilterWhere(['like', 'fecha_rendicion',$this->fecha_rendicion,]);
        if(!empty($this->fecha_rendicion)){
            $this->fecha_rendicion = date("d-m-Y", strtotime($this->fecha_rendicion));
        }
        return $dataProvider;
    }
}
