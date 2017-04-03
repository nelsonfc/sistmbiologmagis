<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pregunta_texto".
 *
 * @property integer $id_pregunta_texto
 * @property string $pregunta
 * @property string $respuesta
 * @property integer $encuestas_id_encuesta
 *
 * @property Encuestas $encuestasIdEncuesta
 */
class PreguntaTexto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pregunta_texto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pregunta', 'respuesta', 'encuestas_id_encuesta'], 'required'],
            [['pregunta', 'respuesta'], 'string'],
            [['encuestas_id_encuesta'], 'integer'],
            [['encuestas_id_encuesta'], 'exist', 'skipOnError' => true, 'targetClass' => Encuestas::className(), 'targetAttribute' => ['encuestas_id_encuesta' => 'id_encuesta']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_pregunta_texto' => 'Id Pregunta Texto',
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
