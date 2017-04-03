<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "estudiante".
 *
 * @property integer $id_estudiante
 * @property string $rut
 * @property string $nombres
 * @property string $apellido_paterno
 * @property string $apellido_materno
 * @property integer $telefono
 * @property integer $movil
 * @property string $correo
 * @property string $direccion
 * @property integer $anio_ingreso
 * @property integer $anio_egreso
 * @property string $id_extranjero
 * @property string $procedencia
 * @property string $profesion
 * @property string $direccion_extranjera
 * @property integer $situacion_academica_id_situacion
 * @property integer $troncal_id_troncal
 *
 * @property AsignaturaInscrita[] $asignaturaInscritas
 * @property SituacionAcademica $situacionAcademicaIdSituacion
 * @property Troncal $troncalIdTroncal
 * @property EstudianteConTutor[] $estudianteConTutors
 * @property ProyectoTesis[] $proyectoTeses
 * @property Tesis[] $teses
 */
class Estudiante extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'estudiante';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombres', 'apellido_paterno', 'apellido_materno', 'telefono', 'movil', 'correo', 'direccion', 'anio_ingreso', 'procedencia', 'profesion', 'situacion_academica_id_situacion', 'troncal_id_troncal'], 'required'],
            [['telefono', 'movil', 'anio_ingreso', 'anio_egreso', 'situacion_academica_id_situacion', 'troncal_id_troncal'], 'integer'],
            [['rut'], 'string', 'max' => 20],
            [['nombres', 'apellido_paterno', 'apellido_materno', 'profesion', 'direccion_extranjera'], 'string', 'max' => 100],
            [['correo', 'direccion'], 'string', 'max' => 150],
            [['id_extranjero'], 'string', 'max' => 50],
            [['procedencia'], 'string', 'max' => 250],
            [['situacion_academica_id_situacion'], 'exist', 'skipOnError' => true, 'targetClass' => SituacionAcademica::className(), 'targetAttribute' => ['situacion_academica_id_situacion' => 'id_situacion']],
            [['troncal_id_troncal'], 'exist', 'skipOnError' => true, 'targetClass' => Troncal::className(), 'targetAttribute' => ['troncal_id_troncal' => 'id_troncal']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_estudiante' => 'Id Estudiante',
            'rut' => 'Rut',
            'nombres' => 'Nombres',
            'apellido_paterno' => 'Apellido Paterno',
            'apellido_materno' => 'Apellido Materno',
            'telefono' => 'Telefono',
            'movil' => 'Movil',
            'correo' => 'Correo',
            'direccion' => 'Direccion',
            'anio_ingreso' => 'Anio Ingreso',
            'anio_egreso' => 'Anio Egreso',
            'id_extranjero' => 'Id Extranjero',
            'procedencia' => 'Procedencia',
            'profesion' => 'Profesion',
            'direccion_extranjera' => 'Direccion Extranjera',
            'situacion_academica_id_situacion' => 'Situacion Academica Id Situacion',
            'troncal_id_troncal' => 'Troncal Id Troncal',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAsignaturaInscritas()
    {
        return $this->hasMany(AsignaturaInscrita::className(), ['estudiante_id_estudiante' => 'id_estudiante']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSituacionAcademicaIdSituacion()
    {
        return $this->hasOne(SituacionAcademica::className(), ['id_situacion' => 'situacion_academica_id_situacion']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTroncalIdTroncal()
    {
        return $this->hasOne(Troncal::className(), ['id_troncal' => 'troncal_id_troncal']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstudianteConTutors()
    {
        return $this->hasMany(EstudianteConTutor::className(), ['estudiante_id_estudiante' => 'id_estudiante']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProyectoTeses()
    {
        return $this->hasMany(ProyectoTesis::className(), ['estudiante_id_estudiante' => 'id_estudiante']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTeses()
    {
        return $this->hasMany(Tesis::className(), ['estudiante_id_estudiante' => 'id_estudiante']);
    }
}
