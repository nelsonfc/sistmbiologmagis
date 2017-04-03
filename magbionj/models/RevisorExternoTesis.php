<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "revisor_externo_tesis".
 *
 * @property integer $id_revision
 * @property integer $nota_oral
 * @property integer $nota_escrita
 * @property integer $nota_final
 * @property integer $revisor_externo_id_revisor
 * @property integer $tesis_id_tesis
 *
 * @property RevisorExterno $revisorExternoIdRevisor
 * @property Tesis $tesisIdTesis
 */
class RevisorExternoTesis extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'revisor_externo_tesis';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nota_oral', 'nota_escrita', 'nota_final', 'revisor_externo_id_revisor', 'tesis_id_tesis'], 'required'],
            [['nota_oral', 'nota_escrita', 'nota_final', 'revisor_externo_id_revisor', 'tesis_id_tesis'], 'integer'],
            [['revisor_externo_id_revisor'], 'exist', 'skipOnError' => true, 'targetClass' => RevisorExterno::className(), 'targetAttribute' => ['revisor_externo_id_revisor' => 'id_revisor']],
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
            'nota_oral' => 'Nota Oral',
            'nota_escrita' => 'Nota Escrita',
            'nota_final' => 'Nota Final',
            'revisor_externo_id_revisor' => 'Revisor Externo Id Revisor',
            'tesis_id_tesis' => 'Tesis Id Tesis',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRevisorExternoIdRevisor()
    {
        return $this->hasOne(RevisorExterno::className(), ['id_revisor' => 'revisor_externo_id_revisor']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTesisIdTesis()
    {
        return $this->hasOne(Tesis::className(), ['id_tesis' => 'tesis_id_tesis']);
    }
}
