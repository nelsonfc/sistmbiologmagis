<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EncuestaConEstudianteSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="encuesta-con-estudiante-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_ece') ?>

    <?= $form->field($model, 'fecha_completado') ?>

    <?= $form->field($model, 'estado') ?>

    <?= $form->field($model, 'anio') ?>

    <?= $form->field($model, 'semestre') ?>

    <?php // echo $form->field($model, 'id_encuesta') ?>

    <?php // echo $form->field($model, 'id_estudiante') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
