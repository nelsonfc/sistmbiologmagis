<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "asignatura_inscrita".
 *
 * @property integer $id_asignatura_inscrita
 * @property integer $calificacion
 * @property integer $estudiante_id_estudiante
 * @property integer $asignatura_disponible_id_asignatura_disponible
 *
 * @property AsignaturaDisponible $asignaturaDisponibleIdAsignaturaDisponible
 * @property Estudiante $estudianteIdEstudiante
 */
class AsignaturaInscrita extends \yii\db\ActiveRecord
{
    public $anio;
    public $semestre;
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
            [['calificacion', 'estudiante_id_estudiante', 'asignatura_disponible_id_asignatura_disponible'], 'required'],
            [['calificacion', 'estudiante_id_estudiante', 'asignatura_disponible_id_asignatura_disponible', 'anio', 'semestre'], 'integer'],
            [['asignatura_disponible_id_asignatura_disponible'], 'exist', 'skipOnError' => true, 'targetClass' => AsignaturaDisponible::className(), 'targetAttribute' => ['asignatura_disponible_id_asignatura_disponible' => 'id_asignatura_disponible']],
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
            'calificacion' => 'Nota',
            'estudiante_id_estudiante' => 'Estudiante Id Estudiante',
            'asignatura_disponible_id_asignatura_disponible' => 'Asignaturas a Inscribir',
            'anio' => 'Año'
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAsignaturaDisponibleIdAsignaturaDisponible()
    {
        return $this->hasOne(AsignaturaDisponible::className(), ['id_asignatura_disponible' => 'asignatura_disponible_id_asignatura_disponible']);
    }

    public static function getListaAnios() {
        $opciones = '';
        $j = 0;
        for($i = 2010 ; $i < date("Y")+1 ;$i++ ){
            $opciones[$j]= ['id' => $i , 'nombre' => $i];
            $j++;
        }
        return \yii\helpers\ArrayHelper::map($opciones, 'id', 'nombre');
    }
    public static function getListaSemestre() {
        $opciones = '';
        $j = 0;
        for($i = 1 ; $i < 3 ;$i++ ){
            $opciones[$j]= ['id' => $i , 'nombre' => $i];
            $j++;
        }
        return \yii\helpers\ArrayHelper::map($opciones, 'id', 'nombre');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstudianteIdEstudiante()
    {
        return $this->hasOne(Estudiante::className(), ['id_estudiante' => 'estudiante_id_estudiante']);
    }
}
