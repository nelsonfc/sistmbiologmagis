<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EstudianteConTutor */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="estudiante-con-tutor-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_estudiante_tutor')->textInput() ?>

    <?= $form->field($model, 'fecha')->textInput() ?>

    <?= $form->field($model, 'estudiante_id_estudiante')->textInput() ?>

    <?= $form->field($model, 'profesor_id_profesor')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
