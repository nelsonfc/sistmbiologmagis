<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pregunta_numerica".
 *
 * @property integer $id_pregunta_numerica
 * @property string $pregunta
 * @property integer $respuesta
 * @property integer $encuestas_id_encuesta
 *
 * @property Encuestas $encuestasIdEncuesta
 */
class PreguntaNumerica extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pregunta_numerica';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pregunta', 'respuesta', 'encuestas_id_encuesta'], 'required'],
            [['pregunta'], 'string'],
            [['respuesta', 'encuestas_id_encuesta'], 'integer'],
            [['encuestas_id_encuesta'], 'exist', 'skipOnError' => true, 'targetClass' => Encuestas::className(), 'targetAttribute' => ['encuestas_id_encuesta' => 'id_encuesta']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_pregunta_numerica' => 'Id Pregunta Numerica',
            'pregunta' => 'Pregunta',
            'respuesta' => 'Respuesta',
            'encuestas_id_encuesta' => 'Encuestas Id Encuesta',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEncuestasIdEncuesta()
    {
        return $this->hasOne(Encuestas::className(), ['id_encuesta' => 'encuestas_id_encuesta']);
    }
}
