<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pregunta_numerica".
 *
 * @property integer $id_pregunta_numerica
 * @property string $pregunta
 * @property integer $encuestas_id_encuesta
 *
 * @property Encuesta $encuestasIdEncuesta
 * @property RespuestaNumerica[] $respuestaNumericas
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
            [['pregunta', 'encuestas_id_encuesta'], 'required'],
            [['pregunta'], 'string'],
            [['encuestas_id_encuesta'], 'integer'],
            [['encuestas_id_encuesta'], 'exist', 'skipOnError' => true, 'targetClass' => Encuesta::className(), 'targetAttribute' => ['encuestas_id_encuesta' => 'id_encuesta']],
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
            'encuestas_id_encuesta' => 'Encuestas Id Encuesta',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEncuestasIdEncuesta()
    {
        return $this->hasOne(Encuesta::className(), ['id_encuesta' => 'encuestas_id_encuesta']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRespuestaNumericas()
    {
        return $this->hasMany(RespuestaNumerica::className(), ['id_preguntanumerica' => 'id_pregunta_numerica']);
    }
}
