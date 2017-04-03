<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "revisor_externo".
 *
 * @property integer $id_revisor
 * @property string $nombre
 * @property string $procedencia
 *
 * @property RevisorExternoProyecto[] $revisorExternoProyectos
 * @property RevisorExternoTesis[] $revisorExternoTeses
 */
class RevisorExterno extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'revisor_externo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'procedencia'], 'required'],
            [['nombre'], 'string', 'max' => 200],
            [['procedencia'], 'string', 'max' => 150],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_revisor' => 'Id Revisor',
            'nombre' => 'Nombre',
            'procedencia' => 'Procedencia',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRevisorExternoProyectos()
    {
        return $this->hasMany(RevisorExternoProyecto::className(), ['revisor_externo_id_revisor' => 'id_revisor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRevisorExternoTeses()
    {
        return $this->hasMany(RevisorExternoTesis::className(), ['revisor_externo_id_revisor' => 'id_revisor']);
    }
}
