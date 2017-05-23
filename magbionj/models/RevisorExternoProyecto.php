<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "revisor_externo_proyecto".
 *
 * @property integer $id_revision
 * @property integer $nota_oral
 * @property integer $nota_escrita
 * @property integer $nota_final
 * @property integer $proyecto_tesis_id_proyecto
 * @property integer $revisor_externo_id_revisor
 *
 * @property ProyectoTesis $proyectoTesisIdProyecto
 * @property RevisorExterno $revisorExternoIdRevisor
 */
class RevisorExternoProyecto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'revisor_externo_proyecto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nota_oral', 'nota_escrita', 'nota_final', 'proyecto_tesis_id_proyecto', 'revisor_externo_id_revisor'], 'integer'],
            [['proyecto_tesis_id_proyecto'], 'exist', 'skipOnError' => true, 'targetClass' => ProyectoTesis::className(), 'targetAttribute' => ['proyecto_tesis_id_proyecto' => 'id_proyecto']],
            [['revisor_externo_id_revisor'], 'exist', 'skipOnError' => true, 'targetClass' => RevisorExterno::className(), 'targetAttribute' => ['revisor_externo_id_revisor' => 'id_revisor']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_revision' => 'Id Revision',
            'nota_oral' => 'Nota Oral (50%)',
            'nota_escrita' => 'Nota Escrita (50%)',
            'nota_final' => 'Promedio',
            'proyecto_tesis_id_proyecto' => 'Proyecto Tesis Id Proyecto',
            'revisor_externo_id_revisor' => 'Revisor Externo',
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
    public function getRevisorExternoIdRevisor()
    {
        return $this->hasOne(RevisorExterno::className(), ['id_revisor' => 'revisor_externo_id_revisor']);
    }
}
