<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TesisTutorSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tesis-tutor-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_tesistutor') ?>

    <?= $form->field($model, 'tipo_tutor_proyecto_id_tipo') ?>

    <?= $form->field($model, 'tesis_id_tesis') ?>

    <?= $form->field($model, 'profesor_id_profesor') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
