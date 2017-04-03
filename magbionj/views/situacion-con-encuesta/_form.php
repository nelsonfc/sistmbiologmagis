<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SituacionConEncuesta */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="situacion-con-encuesta-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'situacion_academica_id_situacion')->textInput() ?>

    <?= $form->field($model, 'encuestas_id_encuesta')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
