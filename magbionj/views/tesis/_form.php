<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Tesis */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tesis-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nombre_tesis')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'financiamiento')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fecha_rendicion')->textInput() ?>

    <?= $form->field($model, 'nota_final')->textInput() ?>

    <?= $form->field($model, 'estado_tesis_id_estado')->textInput() ?>

    <?= $form->field($model, 'estudiante_id_estudiante')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
