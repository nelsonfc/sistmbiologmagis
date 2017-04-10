<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "encuesta_con_estudiante".
 *
 * @property integer $id_ece
 * @property string $fecha_completado
 * @property integer $estado
 * @property integer $anio
 * @property integer $semestre
 * @property integer $id_encuesta
 * @property integer $id_estudiante
 *
 * @property Estudiante $idEstudiante
 * @property Encuesta $idEncuesta
 * @property Estado $estado0
 * @property RespuestaNumerica[] $respuestaNumericas
 * @property RespuestaTexto[] $respuestaTextos
 */
class EncuestaConEstudiante extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'encuesta_con_estudiante';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fecha_completado', 'estado', 'anio', 'semestre', 'id_encuesta', 'id_estudiante'], 'required'],
            [['fecha_completado'], 'safe'],
            [['estado', 'anio', 'semestre', 'id_encuesta', 'id_estudiante'], 'integer'],
            [['id_estudiante'], 'exist', 'skipOnError' => true, 'targetClass' => Estudiante::className(), 'targetAttribute' => ['id_estudiante' => 'id_estudiante']],
            [['id_encuesta'], 'exist', 'skipOnError' => true, 'targetClass' => Encuesta::className(), 'targetAttribute' => ['id_encuesta' => 'id_encuesta']],
            [['estado'], 'exist', 'skipOnError' => true, 'targetClass' => Estado::className(), 'targetAttribute' => ['estado' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_ece' => 'Id Ece',
            'fecha_completado' => 'Fecha Completado',
            'estado' => 'Estado',
            'anio' => 'Anio',
            'semestre' => 'Semestre',
            'id_encuesta' => 'Id Encuesta',
            'id_estudiante' => 'Id Estudiante',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEstudiante()
    {
        return $this->hasOne(Estudiante::className(), ['id_estudiante' => 'id_estudiante']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEncuesta()
    {
        return $this->hasOne(Encuesta::className(), ['id_encuesta' => 'id_encuesta']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstado0()
    {
        return $this->hasOne(Estado::className(), ['id' => 'estado']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRespuestaNumericas()
    {
        return $this->hasMany(RespuestaNumerica::className(), ['id_ece' => 'id_ece']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRespuestaTextos()
    {
        return $this->hasMany(RespuestaTexto::className(), ['id_encuesta_con_estudiante' => 'id_ece']);
    }
}
