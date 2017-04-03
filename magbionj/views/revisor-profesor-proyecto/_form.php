<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RevisorProfesorProyecto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="revisor-profesor-proyecto-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nota_oral')->textInput() ?>

    <?= $form->field($model, 'nota_escrita')->textInput() ?>

    <?= $form->field($model, 'nota_final')->textInput() ?>

    <?= $form->field($model, 'proyecto_tesis_id_proyecto')->textInput() ?>

    <?= $form->field($model, 'profesor_id_profesor')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
