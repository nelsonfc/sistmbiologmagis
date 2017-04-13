<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\AsignaturaInscrita */

$this->title = 'Inscribir Asignaturas';
?>
<div class="asignatura-inscrita-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
