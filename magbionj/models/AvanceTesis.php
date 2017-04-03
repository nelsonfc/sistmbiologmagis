<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "avance_tesis".
 *
 * @property integer $id_avance
 * @property integer $porcentaje
 * @property string $fecha
 * @property integer $tesis_id_tesis
 *
 * @property Tesis $tesisIdTesis
 */
class AvanceTesis extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'avance_tesis';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_avance', 'porcentaje', 'fecha', 'tesis_id_tesis'], 'required'],
            [['id_avance', 'porcentaje', 'tesis_id_tesis'], 'integer'],
            [['fecha'], 'safe'],
            [['tesis_id_tesis'], 'exist', 'skipOnError' => true, 'targetClass' => Tesis::className(), 'targetAttribute' => ['tesis_id_tesis' => 'id_tesis']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_avance' => 'Id Avance',
            'porcentaje' => 'Porcentaje',
            'fecha' => 'Fecha',
            'tesis_id_tesis' => 'Tesis Id Tesis',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTesisIdTesis()
    {
        return $this->hasOne(Tesis::className(), ['id_tesis' => 'tesis_id_tesis']);
    }
}
