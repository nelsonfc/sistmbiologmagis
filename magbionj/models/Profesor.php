<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "profesor".
 *
 * @property integer $id_profesor
 * @property string $rut
 * @property string $nombres
 * @property string $apellidos
 * @property integer $telefono
 * @property string $correo
 * @property integer $troncal_id_troncal
 * @property integer $jerariquia_id_jerarquia
 *
 * @property EstudianteConTutor[] $estudianteConTutors
 * @property Jerarquia $jerariquiaIdJerarquia
 * @property Troncal $troncalIdTroncal
 * @property ProfesorConAsignatura[] $profesorConAsignaturas
 * @property ProyectoTutor[] $proyectoTutors
 * @property RevisorProfesorProyecto[] $revisorProfesorProyectos
 * @property RevisorProfesorTesis[] $revisorProfesorTeses
 * @property TesisTutor[] $tesisTutors
 */
class Profesor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'profesor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rut', 'nombres', 'apellidos', 'telefono', 'correo', 'troncal_id_troncal', 'jerariquia_id_jerarquia'], 'required'],
            [['telefono', 'troncal_id_troncal', 'jerariquia_id_jerarquia'], 'integer'],
            [['rut'], 'string', 'max' => 20],
            [['nombres', 'apellidos', 'correo'], 'string', 'max' => 150],
            [['jerariquia_id_jerarquia'], 'exist', 'skipOnError' => true, 'targetClass' => Jerarquia::className(), 'targetAttribute' => ['jerariquia_id_jerarquia' => 'id_jerarquia']],
            [['troncal_id_troncal'], 'exist', 'skipOnError' => true, 'targetClass' => Troncal::className(), 'targetAttribute' => ['troncal_id_troncal' => 'id_troncal']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_profesor' => 'Id Profesor',
            'rut' => 'Rut',
            'nombres' => 'Nombres',
            'apellidos' => 'Apellidos',
            'telefono' => 'Telefono',
            'correo' => 'Correo',
            'troncal_id_troncal' => 'Troncal Id Troncal',
            'jerariquia_id_jerarquia' => 'Jerariquia Id Jerarquia',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstudianteConTutors()
    {
        return $this->hasMany(EstudianteConTutor::className(), ['profesor_id_profesor' => 'id_profesor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getJerariquiaIdJerarquia()
    {
        return $this->hasOne(Jerarquia::className(), ['id_jerarquia' => 'jerariquia_id_jerarquia']);
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
    public function getProfesorConAsignaturas()
    {
        return $this->hasMany(ProfesorConAsignatura::className(), ['profesor_id_profesor' => 'id_profesor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProyectoTutors()
    {
        return $this->hasMany(ProyectoTutor::className(), ['profesor_id_profesor' => 'id_profesor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRevisorProfesorProyectos()
    {
        return $this->hasMany(RevisorProfesorProyecto::className(), ['profesor_id_profesor' => 'id_profesor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRevisorProfesorTeses()
    {
        return $this->hasMany(RevisorProfesorTesis::className(), ['profesor_id_profesor' => 'id_profesor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTesisTutors()
    {
        return $this->hasMany(TesisTutor::className(), ['profesor_id_profesor' => 'id_profesor']);
    }
}
