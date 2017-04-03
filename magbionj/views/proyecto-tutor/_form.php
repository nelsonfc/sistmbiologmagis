<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProyectoTutor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="proyecto-tutor-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'proyecto_tesis_id_proyecto')->textInput() ?>

    <?= $form->field($model, 'tipo_tutor_proyecto_id_tipo')->textInput() ?>

    <?= $form->field($model, 'profesor_id_profesor')->textInput() ?>

    <?= $form->field($model, 'fecha')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
