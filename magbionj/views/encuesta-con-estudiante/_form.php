<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EncuestaConEstudiante */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="encuesta-con-estudiante-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fecha_completado')->textInput() ?>

    <?= $form->field($model, 'estado')->textInput() ?>

    <?= $form->field($model, 'anio')->textInput() ?>

    <?= $form->field($model, 'semestre')->textInput() ?>

    <?= $form->field($model, 'id_encuesta')->textInput() ?>

    <?= $form->field($model, 'id_estudiante')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
