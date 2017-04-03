<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tesis_tutor".
 *
 * @property integer $id_tesistutor
 * @property integer $tipo_tutor_proyecto_id_tipo
 * @property integer $tesis_id_tesis
 * @property integer $profesor_id_profesor
 * @property integer $fecha
 *
 * @property Profesor $profesorIdProfesor
 * @property Tesis $tesisIdTesis
 * @property TipoTutorProyecto $tipoTutorProyectoIdTipo
 */
class TesisTutor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tesis_tutor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tipo_tutor_proyecto_id_tipo', 'tesis_id_tesis', 'profesor_id_profesor', 'fecha'], 'required'],
            [['tipo_tutor_proyecto_id_tipo', 'tesis_id_tesis', 'profesor_id_profesor', 'fecha'], 'integer'],
            [['profesor_id_profesor'], 'exist', 'skipOnError' => true, 'targetClass' => Profesor::className(), 'targetAttribute' => ['profesor_id_profesor' => 'id_profesor']],
            [['tesis_id_tesis'], 'exist', 'skipOnError' => true, 'targetClass' => Tesis::className(), 'targetAttribute' => ['tesis_id_tesis' => 'id_tesis']],
            [['tipo_tutor_proyecto_id_tipo'], 'exist', 'skipOnError' => true, 'targetClass' => TipoTutorProyecto::className(), 'targetAttribute' => ['tipo_tutor_proyecto_id_tipo' => 'id_tipo']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_tesistutor' => 'Id Tesistutor',
            'tipo_tutor_proyecto_id_tipo' => 'Tipo Tutor Proyecto Id Tipo',
            'tesis_id_tesis' => 'Tesis Id Tesis',
            'profesor_id_profesor' => 'Profesor Id Profesor',
            'fecha' => 'Fecha',
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
    public function getTesisIdTesis()
    {
        return $this->hasOne(Tesis::className(), ['id_tesis' => 'tesis_id_tesis']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoTutorProyectoIdTipo()
    {
        return $this->hasOne(TipoTutorProyecto::className(), ['id_tipo' => 'tipo_tutor_proyecto_id_tipo']);
    }
}
