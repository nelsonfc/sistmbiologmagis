<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "respuesta_numerica".
 *
 * @property integer $id_respuestanumero
 * @property integer $valor_respuesta
 * @property integer $id_preguntanumerica
 * @property integer $id_ece
 *
 * @property EncuestaConEstudiante $idEce
 * @property PreguntaNumerica $idPreguntanumerica
 */
class RespuestaNumerica extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'respuesta_numerica';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['valor_respuesta', 'id_preguntanumerica', 'id_ece'], 'required'],
            [['valor_respuesta', 'id_preguntanumerica', 'id_ece'], 'integer'],
            [['id_ece'], 'exist', 'skipOnError' => true, 'targetClass' => EncuestaConEstudiante::className(), 'targetAttribute' => ['id_ece' => 'id_ece']],
            [['id_preguntanumerica'], 'exist', 'skipOnError' => true, 'targetClass' => PreguntaNumerica::className(), 'targetAttribute' => ['id_preguntanumerica' => 'id_pregunta_numerica']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_respuestanumero' => 'Id Respuestanumero',
            'valor_respuesta' => '',
            'id_preguntanumerica' => 'Id Preguntanumerica',
            'id_ece' => 'Id Ece',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEce()
    {
        return $this->hasOne(EncuestaConEstudiante::className(), ['id_ece' => 'id_ece']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdPreguntanumerica()
    {
        return $this->hasOne(PreguntaNumerica::className(), ['id_pregunta_numerica' => 'id_preguntanumerica']);
    }
}
