<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EstudianteSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="estudiante-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_estudiante') ?>

    <?= $form->field($model, 'rut') ?>

    <?= $form->field($model, 'nombres') ?>

    <?= $form->field($model, 'apellido_paterno') ?>

    <?= $form->field($model, 'apellido_materno') ?>

    <?php // echo $form->field($model, 'telefono') ?>

    <?php // echo $form->field($model, 'movil') ?>

    <?php // echo $form->field($model, 'correo') ?>

    <?php // echo $form->field($model, 'direccion') ?>

    <?php // echo $form->field($model, 'anio_ingreso') ?>

    <?php // echo $form->field($model, 'anio_egreso') ?>

    <?php // echo $form->field($model, 'id_extranjero') ?>

    <?php // echo $form->field($model, 'procedencia') ?>

    <?php // echo $form->field($model, 'profesion') ?>

    <?php // echo $form->field($model, 'direccion_extranjera') ?>

    <?php // echo $form->field($model, 'situacion_academica_id_situacion') ?>

    <?php // echo $form->field($model, 'troncal_id_troncal') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
