<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "profesor_con_asignatura".
 *
 * @property integer $id_profesor_asignatura
 * @property integer $cargo
 * @property integer $asignatura_disponible_id_asignatura_disponible
 * @property integer $profesor_id_profesor
 *
 * @property AsignaturaDisponible $asignaturaDisponibleIdAsignaturaDisponible
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
            [['cargo', 'asignatura_disponible_id_asignatura_disponible', 'profesor_id_profesor'], 'required'],
            [['cargo', 'asignatura_disponible_id_asignatura_disponible', 'profesor_id_profesor'], 'integer'],
            [['asignatura_disponible_id_asignatura_disponible'], 'unique', 'targetAttribute' => ['asignatura_disponible_id_asignatura_disponible', 'profesor_id_profesor']],
            [['asignatura_disponible_id_asignatura_disponible'], 'exist', 'skipOnError' => true, 'targetClass' => AsignaturaDisponible::className(), 'targetAttribute' => ['asignatura_disponible_id_asignatura_disponible' => 'id_asignatura_disponible']],
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
            'asignatura_disponible_id_asignatura_disponible' => 'Asignatura Disponible Id Asignatura Disponible',
            'profesor_id_profesor' => 'Profesor Id Profesor',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAsignaturaDisponibleIdAsignaturaDisponible()
    {
        return $this->hasOne(AsignaturaDisponible::className(), ['id_asignatura_disponible' => 'asignatura_disponible_id_asignatura_disponible']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfesorIdProfesor()
    {
        return $this->hasOne(Profesor::className(), ['id_profesor' => 'profesor_id_profesor']);
    }
}
