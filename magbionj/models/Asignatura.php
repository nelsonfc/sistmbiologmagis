<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "asignatura".
 *
 * @property integer $id_asignatura
 * @property string $nombre
 * @property string $codigo
 * @property integer $tipo
 *
 * @property AsignaturaInscrita[] $asignaturaInscritas
 */
class Asignatura extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'asignatura';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'codigo', 'tipo'], 'required'],
            [['tipo'], 'integer'],
            [['codigo'], 'unique'],
            [['nombre'], 'string', 'max' => 200],
            [['codigo'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_asignatura' => 'Id Asignatura',
            'nombre' => 'Nombre',
            'codigo' => 'Codigo',
            'tipo' => 'Tipo de Asignatura',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAsignaturaInscritas()
    {
        return $this->hasMany(AsignaturaInscrita::className(), ['asignatura_id_asignatura' => 'id_asignatura']);
    }

    public static function getListaTipos() {
        $opciones[0] = ['id' => 1, 'nombre' => 'Normal'];
        $opciones[1] = ['id' => 2, 'nombre' => 'Electivo'];
        return \yii\helpers\ArrayHelper::map($opciones, 'id', 'nombre');
    }

}
