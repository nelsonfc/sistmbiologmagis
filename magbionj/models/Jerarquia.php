<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "jerarquia".
 *
 * @property integer $id_jerarquia
 * @property string $nombre
 *
 * @property Profesor[] $profesors
 */
class Jerarquia extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jerarquia';
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
            'id_jerarquia' => 'Id Jerarquia',
            'nombre' => 'Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfesors()
    {
        return $this->hasMany(Profesor::className(), ['jerariquia_id_jerarquia' => 'id_jerarquia']);
    }
}
