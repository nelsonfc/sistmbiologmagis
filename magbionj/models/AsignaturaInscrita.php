<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "asignatura_inscrita".
 *
 * @property integer $id_asignatura_inscrita
 * @property integer $calificacion
 * @property integer $anio
 * @property integer $semestre
 * @property integer $estudiante_id_estudiante
 * @property integer $asignatura_id_asignatura
 *
 * @property Asignatura $asignaturaIdAsignatura
 * @property Estudiante $estudianteIdEstudiante
 * @property ProfesorConAsignatura[] $profesorConAsignaturas
 */
class AsignaturaInscrita extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'asignatura_inscrita';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_asignatura_inscrita', 'calificacion', 'anio', 'semestre', 'estudiante_id_estudiante', 'asignatura_id_asignatura'], 'required'],
            [['id_asignatura_inscrita', 'calificacion', 'anio', 'semestre', 'estudiante_id_estudiante', 'asignatura_id_asignatura'], 'integer'],
            [['asignatura_id_asignatura'], 'exist', 'skipOnError' => true, 'targetClass' => Asignatura::className(), 'targetAttribute' => ['asignatura_id_asignatura' => 'id_asignatura']],
            [['estudiante_id_estudiante'], 'exist', 'skipOnError' => true, 'targetClass' => Estudiante::className(), 'targetAttribute' => ['estudiante_id_estudiante' => 'id_estudiante']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_asignatura_inscrita' => 'Id Asignatura Inscrita',
            'calificacion' => 'Calificacion',
            'anio' => 'Anio',
            'semestre' => 'Semestre',
            'estudiante_id_estudiante' => 'Estudiante Id Estudiante',
            'asignatura_id_asignatura' => 'Asignatura Id Asignatura',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAsignaturaIdAsignatura()
    {
        return $this->hasOne(Asignatura::className(), ['id_asignatura' => 'asignatura_id_asignatura']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstudianteIdEstudiante()
    {
        return $this->hasOne(Estudiante::className(), ['id_estudiante' => 'estudiante_id_estudiante']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfesorConAsignaturas()
    {
        return $this->hasMany(ProfesorConAsignatura::className(), ['asignatura_inscrita_id_asignatura_inscrita' => 'id_asignatura_inscrita']);
    }
}
