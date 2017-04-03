<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EstudianteConTutorSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="estudiante-con-tutor-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_estudiante_tutor') ?>

    <?= $form->field($model, 'fecha') ?>

    <?= $form->field($model, 'estudiante_id_estudiante') ?>

    <?= $form->field($model, 'profesor_id_profesor') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
