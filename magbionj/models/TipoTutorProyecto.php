<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tipo_tutor_proyecto".
 *
 * @property integer $id_tipo
 * @property string $nombre
 *
 * @property ProyectoTutor[] $proyectoTutors
 * @property TesisTutor[] $tesisTutors
 */
class TipoTutorProyecto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tipo_tutor_proyecto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['nombre'], 'string', 'max' => 150],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_tipo' => 'Id Tipo',
            'nombre' => 'Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProyectoTutors()
    {
        return $this->hasMany(ProyectoTutor::className(), ['tipo_tutor_proyecto_id_tipo' => 'id_tipo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTesisTutors()
    {
        return $this->hasMany(TesisTutor::className(), ['tipo_tutor_proyecto_id_tipo' => 'id_tipo']);
    }
}
