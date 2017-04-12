<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AsignaturaInscrita */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="asignatura-inscrita-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'asignatura_disponible_id_asignatura_disponible')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Guardar' : 'Guardar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
