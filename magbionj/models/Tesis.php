<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tesis".
 *
 * @property integer $id_tesis
 * @property string $nombre_tesis
 * @property string $financiamiento
 * @property string $fecha_rendicion
 * @property integer $nota_final
 * @property integer $estado_tesis_id_estado
 * @property integer $estudiante_id_estudiante
 *
 * @property AvanceProyecto[] $avanceProyectos
 * @property AvanceTesis[] $avanceTeses
 * @property RevisorExternoTesis[] $revisorExternoTeses
 * @property RevisorProfesorTesis[] $revisorProfesorTeses
 * @property EstadoTesis $estadoTesisIdEstado
 * @property Estudiante $estudianteIdEstudiante
 * @property TesisTutor[] $tesisTutors
 */
class Tesis extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tesis';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre_tesis', 'fecha_rendicion', 'nota_final', 'estado_tesis_id_estado', 'estudiante_id_estudiante'], 'required'],
            [['fecha_rendicion'], 'safe'],
            [['nota_final', 'estado_tesis_id_estado', 'estudiante_id_estudiante'], 'integer'],
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
            'id_tesis' => 'Id Tesis',
            'nombre_tesis' => 'Nombre Tesis',
            'financiamiento' => 'Financiamiento',
            'fecha_rendicion' => 'Fecha Rendicion',
            'nota_final' => 'Nota Final',
            'estado_tesis_id_estado' => 'Estado Tesis Id Estado',
            'estudiante_id_estudiante' => 'Estudiante Id Estudiante',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAvanceProyectos()
    {
        return $this->hasMany(AvanceProyecto::className(), ['tesis_id_tesis' => 'id_tesis']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAvanceTeses()
    {
        return $this->hasMany(AvanceTesis::className(), ['tesis_id_tesis' => 'id_tesis']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRevisorExternoTeses()
    {
        return $this->hasMany(RevisorExternoTesis::className(), ['tesis_id_tesis' => 'id_tesis']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRevisorProfesorTeses()
    {
        return $this->hasMany(RevisorProfesorTesis::className(), ['tesis_id_tesis' => 'id_tesis']);
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
    public function getTesisTutors()
    {
        return $this->hasMany(TesisTutor::className(), ['tesis_id_tesis' => 'id_tesis']);
    }
}
