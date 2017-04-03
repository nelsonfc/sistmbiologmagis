<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "estado_tesis".
 *
 * @property integer $id_estado
 * @property string $nombre
 *
 * @property ProyectoTesis[] $proyectoTeses
 * @property Tesis[] $teses
 */
class EstadoTesis extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'estado_tesis';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_estado', 'nombre'], 'required'],
            [['id_estado'], 'integer'],
            [['nombre'], 'string', 'max' => 150],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_estado' => 'Id Estado',
            'nombre' => 'Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProyectoTeses()
    {
        return $this->hasMany(ProyectoTesis::className(), ['estado_tesis_id_estado' => 'id_estado']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTeses()
    {
        return $this->hasMany(Tesis::className(), ['estado_tesis_id_estado' => 'id_estado']);
    }
}
