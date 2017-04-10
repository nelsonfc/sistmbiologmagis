<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "estado".
 *
 * @property integer $id
 * @property string $nombre_estado
 *
 * @property EncuestaConEstudiante[] $encuestaConEstudiantes
 */
class Estado extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'estado';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre_estado'], 'required'],
            [['nombre_estado'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre_estado' => 'Nombre Estado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEncuestaConEstudiantes()
    {
        return $this->hasMany(EncuestaConEstudiante::className(), ['estado' => 'id']);
    }
}
