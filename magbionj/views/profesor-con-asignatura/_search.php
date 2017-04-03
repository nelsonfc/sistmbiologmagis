<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProfesorConAsignaturaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="profesor-con-asignatura-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_profesor_asignatura') ?>

    <?= $form->field($model, 'cargo') ?>

    <?= $form->field($model, 'asignatura_inscrita_id_asignatura_inscrita') ?>

    <?= $form->field($model, 'profesor_id_profesor') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
