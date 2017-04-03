<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "revisor_profesor_proyecto".
 *
 * @property integer $id_revision
 * @property integer $nota_oral
 * @property integer $nota_escrita
 * @property integer $nota_final
 * @property integer $proyecto_tesis_id_proyecto
 * @property integer $profesor_id_profesor
 *
 * @property Profesor $profesorIdProfesor
 * @property ProyectoTesis $proyectoTesisIdProyecto
 */
class RevisorProfesorProyecto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'revisor_profesor_proyecto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nota_oral', 'nota_escrita', 'nota_final', 'proyecto_tesis_id_proyecto', 'profesor_id_profesor'], 'required'],
            [['nota_oral', 'nota_escrita', 'nota_final', 'proyecto_tesis_id_proyecto', 'profesor_id_profesor'], 'integer'],
            [['profesor_id_profesor'], 'exist', 'skipOnError' => true, 'targetClass' => Profesor::className(), 'targetAttribute' => ['profesor_id_profesor' => 'id_profesor']],
            [['proyecto_tesis_id_proyecto'], 'exist', 'skipOnError' => true, 'targetClass' => ProyectoTesis::className(), 'targetAttribute' => ['proyecto_tesis_id_proyecto' => 'id_proyecto']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_revision' => 'Id Revision',
            'nota_oral' => 'Nota Oral',
            'nota_escrita' => 'Nota Escrita',
            'nota_final' => 'Nota Final',
            'proyecto_tesis_id_proyecto' => 'Proyecto Tesis Id Proyecto',
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
}
