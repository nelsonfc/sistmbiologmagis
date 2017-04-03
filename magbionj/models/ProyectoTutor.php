<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "proyecto_tutor".
 *
 * @property integer $id_proyectotutor
 * @property integer $proyecto_tesis_id_proyecto
 * @property integer $tipo_tutor_proyecto_id_tipo
 * @property integer $profesor_id_profesor
 *
 * @property Profesor $profesorIdProfesor
 * @property ProyectoTesis $proyectoTesisIdProyecto
 * @property TipoTutorProyecto $tipoTutorProyectoIdTipo
 */
class ProyectoTutor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'proyecto_tutor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_proyectotutor', 'proyecto_tesis_id_proyecto', 'tipo_tutor_proyecto_id_tipo', 'profesor_id_profesor'], 'required'],
            [['id_proyectotutor', 'proyecto_tesis_id_proyecto', 'tipo_tutor_proyecto_id_tipo', 'profesor_id_profesor'], 'integer'],
            [['profesor_id_profesor'], 'exist', 'skipOnError' => true, 'targetClass' => Profesor::className(), 'targetAttribute' => ['profesor_id_profesor' => 'id_profesor']],
            [['proyecto_tesis_id_proyecto'], 'exist', 'skipOnError' => true, 'targetClass' => ProyectoTesis::className(), 'targetAttribute' => ['proyecto_tesis_id_proyecto' => 'id_proyecto']],
            [['tipo_tutor_proyecto_id_tipo'], 'exist', 'skipOnError' => true, 'targetClass' => TipoTutorProyecto::className(), 'targetAttribute' => ['tipo_tutor_proyecto_id_tipo' => 'id_tipo']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_proyectotutor' => 'Id Proyectotutor',
            'proyecto_tesis_id_proyecto' => 'Proyecto Tesis Id Proyecto',
            'tipo_tutor_proyecto_id_tipo' => 'Tipo Tutor Proyecto Id Tipo',
            'profesor_id_profesor' => 'Profesor Id Profesor',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfesorIdProfesor()
    {
        return $this->hasOne(Profesor::className(), ['id_profesor' => 'profesor_id_profesor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProyectoTesisIdProyecto()
    {
        return $this->hasOne(ProyectoTesis::className(), ['id_proyecto' => 'proyecto_tesis_id_proyecto']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoTutorProyectoIdTipo()
    {
        return $this->hasOne(TipoTutorProyecto::className(), ['id_tipo' => 'tipo_tutor_proyecto_id_tipo']);
    }
}
