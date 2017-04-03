<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tutor".
 *
 * @property integer $id_tutor
 * @property string $rut
 * @property string $nombres
 * @property string $apellidos
 * @property integer $telefono
 * @property string $correo
 */
class Tutor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tutor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['rut', 'nombres', 'apellidos', 'telefono', 'correo'], 'required'],
            [['telefono'], 'integer'],
            [['rut'], 'string', 'max' => 20],
            [['nombres', 'apellidos', 'correo'], 'string', 'max' => 150],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_tutor' => 'Id Tutor',
            'rut' => 'Rut',
            'nombres' => 'Nombres',
            'apellidos' => 'Apellidos',
            'telefono' => 'Telefono',
            'correo' => 'Correo',
        ];
    }
}
