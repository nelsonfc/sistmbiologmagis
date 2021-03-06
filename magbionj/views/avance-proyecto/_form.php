<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AvanceProyecto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="avance-proyecto-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'porcentaje')->textInput() ?>

    <?= $form->field($model, 'fecha')->textInput() ?>

    <?= $form->field($model, 'proyecto_tesis_id_proyecto')->textInput() ?>

    <?= $form->field($model, 'tesis_id_tesis')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
