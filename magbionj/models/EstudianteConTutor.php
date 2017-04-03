<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "estudiante_con_tutor".
 *
 * @property integer $id_estudiante_tutor
 * @property string $fecha
 * @property integer $estudiante_id_estudiante
 * @property integer $profesor_id_profesor
 *
 * @property Estudiante $estudianteIdEstudiante
 * @property Profesor $profesorIdProfesor
 */
class EstudianteConTutor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'estudiante_con_tutor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_estudiante_tutor', 'fecha', 'estudiante_id_estudiante', 'profesor_id_profesor'], 'required'],
            [['id_estudiante_tutor', 'estudiante_id_estudiante', 'profesor_id_profesor'], 'integer'],
            [['fecha'], 'safe'],
            [['estudiante_id_estudiante'], 'exist', 'skipOnError' => true, 'targetClass' => Estudiante::className(), 'targetAttribute' => ['estudiante_id_estudiante' => 'id_estudiante']],
            [['profesor_id_profesor'], 'exist', 'skipOnError' => true, 'targetClass' => Profesor::className(), 'targetAttribute' => ['profesor_id_profesor' => 'id_profesor']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_estudiante_tutor' => 'Id Estudiante Tutor',
            'fecha' => 'Fecha',
            'estudiante_id_estudiante' => 'Estudiante Id Estudiante',
            'profesor_id_profesor' => 'Profesor Id Profesor',
        ];
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
    public function getProfesorIdProfesor()
    {
        return $this->hasOne(Profesor::className(), ['id_profesor' => 'profesor_id_profesor']);
    }
}
