<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "avance_proyecto".
 *
 * @property integer $id_avance
 * @property integer $porcentaje
 * @property string $fecha
 * @property integer $proyecto_tesis_id_proyecto
 * @property integer $tesis_id_tesis
 *
 * @property ProyectoTesis $proyectoTesisIdProyecto
 * @property Tesis $tesisIdTesis
 */
class AvanceProyecto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'avance_proyecto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['porcentaje', 'fecha', 'proyecto_tesis_id_proyecto', 'tesis_id_tesis'], 'required'],
            [['porcentaje', 'proyecto_tesis_id_proyecto', 'tesis_id_tesis'], 'integer'],
            [['fecha'], 'safe'],
            [['proyecto_tesis_id_proyecto'], 'exist', 'skipOnError' => true, 'targetClass' => ProyectoTesis::className(), 'targetAttribute' => ['proyecto_tesis_id_proyecto' => 'id_proyecto']],
            [['tesis_id_tesis'], 'exist', 'skipOnError' => true, 'targetClass' => Tesis::className(), 'targetAttribute' => ['tesis_id_tesis' => 'id_tesis']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_avance' => 'Id Avance',
            'porcentaje' => 'Porcentaje',
            'fecha' => 'Fecha',
            'proyecto_tesis_id_proyecto' => 'Proyecto Tesis Id Proyecto',
            'tesis_id_tesis' => 'Tesis Id Tesis',
        ];
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
    public function getTesisIdTesis()
    {
        return $this->hasOne(Tesis::className(), ['id_tesis' => 'tesis_id_tesis']);
    }
}
