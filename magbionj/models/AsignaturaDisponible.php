<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "asignatura_disponible".
 *
 * @property integer $id_asignatura_disponible
 * @property integer $anio
 * @property integer $semestre
 * @property integer $asignatura_id_asignatura
 *
 * @property Asignatura $asignaturaIdAsignatura
 * @property AsignaturaInscrita[] $asignaturaInscritas
 * @property ProfesorConAsignatura[] $profesorConAsignaturas
 */
class AsignaturaDisponible extends \yii\db\ActiveRecord
{
    public $profesor;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'asignatura_disponible';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['anio', 'semestre', 'asignatura_id_asignatura', 'profesor'], 'required'],
            [['anio', 'semestre', 'asignatura_id_asignatura'], 'integer'],
            [['asignatura_id_asignatura','anio', 'semestre'], 'unique', 'targetAttribute' => ['anio', 'semestre', 'asignatura_id_asignatura']],
            [['asignatura_id_asignatura'], 'exist', 'skipOnError' => true, 'targetClass' => Asignatura::className(), 'targetAttribute' => ['asignatura_id_asignatura' => 'id_asignatura']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_asignatura_disponible' => 'Id Asignatura Disponible',
            'anio' => 'Año',
            'semestre' => 'Semestre',
            'asignatura_id_asignatura' => 'Asignatura',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAsignaturaIdAsignatura()
    {
        return $this->hasOne(Asignatura::className(), ['id_asignatura' => 'asignatura_id_asignatura']);
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

    public static function getListaProfesor() {
        $opciones = Profesor::find()->all();
        $i=0;
        $options = '';
        foreach($opciones as $opcion){
            $options[$i] = ['id_profesor' => $opcion->id_profesor, 'nombre' => $opcion->nombres.' '.$opcion->apellidos];
            $i++;
        }
        return \yii\helpers\ArrayHelper::map($options, 'id_profesor', 'nombre');
    }
    public static function getListaAsignatura() {
        $opciones = Asignatura::find()->all();
        $i=0;
        $options = '';
        foreach($opciones as $opcion){
            if($opcion->tipo == 1){
                $options[$i] = ['id_asignatura' => $opcion->id_asignatura, 'nombre' => '('.$opcion->codigo.') '.$opcion->nombre.' (Normal)'];
            }else{
                $options[$i] = ['id_asignatura' => $opcion->id_asignatura, 'nombre' => '('.$opcion->codigo.') '.$opcion->nombre.' (Electivo)'];
            }
            $i++;
        }
        return \yii\helpers\ArrayHelper::map($options, 'id_asignatura', 'nombre');
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAsignaturaInscritas()
    {
        return $this->hasMany(AsignaturaInscrita::className(), ['asignatura_disponible_id_asignatura_disponible' => 'id_asignatura_disponible']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfesorConAsignaturas()
    {
        return $this->hasMany(ProfesorConAsignatura::className(), ['asignatura_disponible_id_asignatura_disponible' => 'id_asignatura_disponible']);
    }
}
