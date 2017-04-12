<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AsignaturaDisponibleSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="asignatura-disponible-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_asignatura_disponible') ?>

    <?= $form->field($model, 'anio') ?>

    <?= $form->field($model, 'semestre') ?>

    <?= $form->field($model, 'asignatura_id_asignatura') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
