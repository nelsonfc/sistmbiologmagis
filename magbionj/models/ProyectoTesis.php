<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "proyecto_tesis".
 *
 * @property integer $id_proyecto
 * @property string $nombre_tesis
 * @property string $financiamiento
 * @property string $fecha_rendicion
 * @property integer $nota_final
 * @property integer $estudiante_id_estudiante
 * @property integer $estado_tesis_id_estado
 *
 * @property AvanceProyecto[] $avanceProyectos
 * @property EstadoTesis $estadoTesisIdEstado
 * @property Estudiante $estudianteIdEstudiante
 * @property ProyectoTutor[] $proyectoTutors
 * @property RevisorExternoProyecto[] $revisorExternoProyectos
 * @property RevisorProfesorProyecto[] $revisorProfesorProyectos
 */
class ProyectoTesis extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'proyecto_tesis';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_proyecto', 'nombre_tesis', 'fecha_rendicion', 'nota_final', 'estudiante_id_estudiante', 'estado_tesis_id_estado'], 'required'],
            [['id_proyecto', 'nota_final', 'estudiante_id_estudiante', 'estado_tesis_id_estado'], 'integer'],
            [['fecha_rendicion'], 'safe'],
            [['nombre_tesis'], 'string', 'max' => 150],
            [['financiamiento'], 'string', 'max' => 160],
            [['estado_tesis_id_estado'], 'exist', 'skipOnError' => true, 'targetClass' => EstadoTesis::className(), 'targetAttribute' => ['estado_tesis_id_estado' => 'id_estado']],
            [['estudiante_id_estudiante'], 'exist', 'skipOnError' => true, 'targetClass' => Estudiante::className(), 'targetAttribute' => ['estudiante_id_estudiante' => 'id_estudiante']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_proyecto' => 'Id Proyecto',
            'nombre_tesis' => 'Nombre Tesis',
            'financiamiento' => 'Financiamiento',
            'fecha_rendicion' => 'Fecha Rendicion',
            'nota_final' => 'Nota Final',
            'estudiante_id_estudiante' => 'Estudiante Id Estudiante',
            'estado_tesis_id_estado' => 'Estado Tesis Id Estado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAvanceProyectos()
    {
        return $this->hasMany(AvanceProyecto::className(), ['proyecto_tesis_id_proyecto' => 'id_proyecto']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstadoTesisIdEstado()
    {
        return $this->hasOne(EstadoTesis::className(), ['id_estado' => 'estado_tesis_id_estado']);
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
    public function getProyectoTutors()
    {
        return $this->hasMany(ProyectoTutor::className(), ['proyecto_tesis_id_proyecto' => 'id_proyecto']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRevisorExternoProyectos()
    {
        return $this->hasMany(RevisorExternoProyecto::className(), ['proyecto_tesis_id_proyecto' => 'id_proyecto']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRevisorProfesorProyectos()
    {
        return $this->hasMany(RevisorProfesorProyecto::className(), ['proyecto_tesis_id_proyecto' => 'id_proyecto']);
    }
}
