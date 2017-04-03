<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RevisorExternoTesis */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="revisor-externo-tesis-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_revision')->textInput() ?>

    <?= $form->field($model, 'nota_oral')->textInput() ?>

    <?= $form->field($model, 'nota_escrita')->textInput() ?>

    <?= $form->field($model, 'nota_final')->textInput() ?>

    <?= $form->field($model, 'revisor_externo_id_revisor')->textInput() ?>

    <?= $form->field($model, 'tesis_id_tesis')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
