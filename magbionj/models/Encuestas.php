<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "encuestas".
 *
 * @property integer $id_encuesta
 * @property string $nombre_encuesta
 *
 * @property PreguntaNumerica[] $preguntaNumericas
 * @property PreguntaTexto[] $preguntaTextos
 * @property SituacionConEncuesta[] $situacionConEncuestas
 */
class Encuestas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'encuestas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_encuesta', 'nombre_encuesta'], 'required'],
            [['id_encuesta'], 'integer'],
            [['nombre_encuesta'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_encuesta' => 'Id Encuesta',
            'nombre_encuesta' => 'Nombre Encuesta',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPreguntaNumericas()
    {
        return $this->hasMany(PreguntaNumerica::className(), ['encuestas_id_encuesta' => 'id_encuesta']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPreguntaTextos()
    {
        return $this->hasMany(PreguntaTexto::className(), ['encuestas_id_encuesta' => 'id_encuesta']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSituacionConEncuestas()
    {
        return $this->hasMany(SituacionConEncuesta::className(), ['encuestas_id_encuesta' => 'id_encuesta']);
    }
}
