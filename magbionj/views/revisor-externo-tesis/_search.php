<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\RevisorExternoTesisSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="revisor-externo-tesis-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_revision') ?>

    <?= $form->field($model, 'nota_oral') ?>

    <?= $form->field($model, 'nota_escrita') ?>

    <?= $form->field($model, 'nota_final') ?>

    <?= $form->field($model, 'revisor_externo_id_revisor') ?>

    <?php // echo $form->field($model, 'tesis_id_tesis') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
