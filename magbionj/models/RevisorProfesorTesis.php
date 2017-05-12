<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "revisor_profesor_tesis".
 *
 * @property integer $id_revision
 * @property integer $nota_oral
 * @property integer $nota_escrita
 * @property integer $nota_final
 * @property integer $profesor_id_profesor
 * @property integer $tesis_id_tesis
 *
 * @property Profesor $profesorIdProfesor
 * @property Tesis $tesisIdTesis
 */
class RevisorProfesorTesis extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'revisor_profesor_tesis';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nota_oral', 'nota_escrita', 'nota_final', 'profesor_id_profesor', 'tesis_id_tesis'], 'required'],
            [['nota_oral', 'nota_escrita', 'nota_final', 'profesor_id_profesor', 'tesis_id_tesis'], 'integer'],
            [['profesor_id_profesor'], 'exist', 'skipOnError' => true, 'targetClass' => Profesor::className(), 'targetAttribute' => ['profesor_id_profesor' => 'id_profesor']],
            [['tesis_id_tesis'], 'exist', 'skipOnError' => true, 'targetClass' => Tesis::className(), 'targetAttribute' => ['tesis_id_tesis' => 'id_tesis']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_revision' => 'Id Revision',
            'nota_oral' => 'Nota Oral (50%)',
            'nota_escrita' => 'Nota Escrita (50%)',
            'nota_final' => 'Promedio',
            'profesor_id_profesor' => 'Revisor',
            'tesis_id_tesis' => 'Tesis Id Tesis',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProfesorIdProfesor()
    {
        return $this->hasOne(Profesor::className(), ['id_profesor' => 'profesor_id_profesor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTesisIdTesis()
    {
        return $this->hasOne(Tesis::className(), ['id_tesis' => 'tesis_id_tesis']);
    }
}
