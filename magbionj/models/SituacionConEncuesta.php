<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "situacion_con_encuesta".
 *
 * @property integer $id_sce
 * @property integer $situacion_academica_id_situacion
 * @property integer $encuestas_id_encuesta
 *
 * @property Encuestas $encuestasIdEncuesta
 * @property SituacionAcademica $situacionAcademicaIdSituacion
 */
class SituacionConEncuesta extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'situacion_con_encuesta';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['situacion_academica_id_situacion', 'encuestas_id_encuesta'], 'required'],
            [['situacion_academica_id_situacion', 'encuestas_id_encuesta'], 'integer'],
            [['encuestas_id_encuesta'], 'exist', 'skipOnError' => true, 'targetClass' => Encuestas::className(), 'targetAttribute' => ['encuestas_id_encuesta' => 'id_encuesta']],
            [['situacion_academica_id_situacion'], 'exist', 'skipOnError' => true, 'targetClass' => SituacionAcademica::className(), 'targetAttribute' => ['situacion_academica_id_situacion' => 'id_situacion']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_sce' => 'Id Sce',
            'situacion_academica_id_situacion' => 'Situacion Academica Id Situacion',
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSituacionAcademicaIdSituacion()
    {
        return $this->hasOne(SituacionAcademica::className(), ['id_situacion' => 'situacion_academica_id_situacion']);
    }
}
