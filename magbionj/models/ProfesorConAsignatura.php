<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "profesor_con_asignatura".
 *
 * @property integer $id_profesor_asignatura
 * @property integer $cargo
 * @property integer $asignatura_inscrita_id_asignatura_inscrita
 * @property integer $profesor_id_profesor
 *
 * @property AsignaturaInscrita $asignaturaInscritaIdAsignaturaInscrita
 * @property Profesor $profesorIdProfesor
 */
class ProfesorConAsignatura extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'profesor_con_asignatura';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cargo', 'asignatura_inscrita_id_asignatura_inscrita', 'profesor_id_profesor'], 'required'],
            [['cargo', 'asignatura_inscrita_id_asignatura_inscrita', 'profesor_id_profesor'], 'integer'],
            [['asignatura_inscrita_id_asignatura_inscrita'], 'exist', 'skipOnError' => true, 'targetClass' => AsignaturaInscrita::className(), 'targetAttribute' => ['asignatura_inscrita_id_asignatura_inscrita' => 'id_asignatura_inscrita']],
            [['profesor_id_profesor'], 'exist', 'skipOnError' => true, 'targetClass' => Profesor::className(), 'targetAttribute' => ['profesor_id_profesor' => 'id_profesor']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_profesor_asignatura' => 'Id Profesor Asignatura',
            'cargo' => 'Cargo',
            'asignatura_inscrita_id_asignatura_inscrita' => 'Asignatura Inscrita Id Asignatura Inscrita',
            'profesor_id_profesor' => 'Profesor Id Profesor',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAsignaturaInscritaIdAsignaturaInscrita()
    {
        return $this->hasOne(AsignaturaInscrita::className(), ['id_asignatura_inscrita' => 'asignatura_inscrita_id_asignatura_inscrita']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfesorIdProfesor()
    {
        return $this->hasOne(Profesor::className(), ['id_profesor' => 'profesor_id_profesor']);
    }
}
