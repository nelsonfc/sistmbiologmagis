<?php

use app\models\Encuesta;
use kartik\widgets\Select2;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PreguntaNumerica */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pregunta-numerica-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'pregunta')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'encuestas_id_encuesta')->widget(Select2::className(), [
        'data' => ArrayHelper::map(Encuesta::find()->all(),'id_encuesta', 'nombre_encuesta'),
        'language' => 'es',
        'options' => ['placeholder' => 'Encuesta Asociada'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
