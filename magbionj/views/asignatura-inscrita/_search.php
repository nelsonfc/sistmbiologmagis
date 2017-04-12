<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AsignaturaInscritaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="asignatura-inscrita-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_asignatura_inscrita') ?>

    <?= $form->field($model, 'calificacion') ?>

    <?= $form->field($model, 'estudiante_id_estudiante') ?>

    <?= $form->field($model, 'asignatura_disponible_id_asignatura_disponible') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
