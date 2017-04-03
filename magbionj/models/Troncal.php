<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "troncal".
 *
 * @property integer $id_troncal
 * @property string $nombre
 *
 * @property Estudiante[] $estudiantes
 * @property Profesor[] $profesors
 */
class Troncal extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'troncal';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_troncal', 'nombre'], 'required'],
            [['id_troncal'], 'integer'],
            [['nombre'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_troncal' => 'Id Troncal',
            'nombre' => 'Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstudiantes()
    {
        return $this->hasMany(Estudiante::className(), ['troncal_id_troncal' => 'id_troncal']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfesors()
    {
        return $this->hasMany(Profesor::className(), ['troncal_id_troncal' => 'id_troncal']);
    }
}
