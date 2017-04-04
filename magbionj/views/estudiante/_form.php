<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Estudiante */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="estudiante-form">

    <?php $form = ActiveForm::begin(); ?>
    <div>
        <div>

        </div>
    </div>
    <?= $form->field($model, 'rut')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nombres')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'apellido_paterno')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'apellido_materno')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telefono')->textInput() ?>

    <?= $form->field($model, 'movil')->textInput() ?>

    <?= $form->field($model, 'correo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'direccion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'anio_ingreso')->textInput() ?>

    <?= $form->field($model, 'anio_egreso')->textInput() ?>

    <?= $form->field($model, 'id_extranjero')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'procedencia')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'profesion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'direccion_extranjera')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'situacion_academica_id_situacion')->textInput() ?>

    <?= $form->field($model, 'troncal_id_troncal')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
