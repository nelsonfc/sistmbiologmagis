<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProfesorConAsignatura */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="profesor-con-asignatura-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cargo')->textInput() ?>

    <?= $form->field($model, 'asignatura_disponible_id_asignatura_disponible')->textInput() ?>

    <?= $form->field($model, 'profesor_id_profesor')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
