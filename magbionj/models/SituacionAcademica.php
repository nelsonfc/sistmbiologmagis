<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "situacion_academica".
 *
 * @property integer $id_situacion
 * @property string $nombre
 *
 * @property Estudiante[] $estudiantes
 * @property SituacionConEncuesta[] $situacionConEncuestas
 */
class SituacionAcademica extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'situacion_academica';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['nombre'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_situacion' => 'Id Situacion',
            'nombre' => 'Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstudiantes()
    {
        return $this->hasMany(Estudiante::className(), ['situacion_academica_id_situacion' => 'id_situacion']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSituacionConEncuestas()
    {
        return $this->hasMany(SituacionConEncuesta::className(), ['situacion_academica_id_situacion' => 'id_situacion']);
    }
}
