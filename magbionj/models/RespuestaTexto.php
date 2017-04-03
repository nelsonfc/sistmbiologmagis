<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "respuesta_texto".
 *
 * @property integer $id
 * @property string $respuesta
 * @property integer $id_pregunta_texto
 * @property integer $id_encuesta_con_estudiante
 *
 * @property PreguntaTexto $idPreguntaTexto
 * @property EncuestaConEstudiante $idEncuestaConEstudiante
 */
class RespuestaTexto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'respuesta_texto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['respuesta', 'id_pregunta_texto', 'id_encuesta_con_estudiante'], 'required'],
            [['respuesta'], 'string'],
            [['id_pregunta_texto', 'id_encuesta_con_estudiante'], 'integer'],
            [['id_pregunta_texto'], 'exist', 'skipOnError' => true, 'targetClass' => PreguntaTexto::className(), 'targetAttribute' => ['id_pregunta_texto' => 'id_pregunta_texto']],
            [['id_encuesta_con_estudiante'], 'exist', 'skipOnError' => true, 'targetClass' => EncuestaConEstudiante::className(), 'targetAttribute' => ['id_encuesta_con_estudiante' => 'id_ece']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'respuesta' => 'Respuesta',
            'id_pregunta_texto' => 'Id Pregunta Texto',
            'id_encuesta_con_estudiante' => 'Id Encuesta Con Estudiante',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPreguntaTexto()
    {
        return $this->hasOne(PreguntaTexto::className(), ['id_pregunta_texto' => 'id_pregunta_texto']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEncuestaConEstudiante()
    {
        return $this->hasOne(EncuestaConEstudiante::className(), ['id_ece' => 'id_encuesta_con_estudiante']);
    }
}
