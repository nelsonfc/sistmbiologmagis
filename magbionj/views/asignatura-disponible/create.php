<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\AsignaturaDisponible */

$this->title = 'Create Asignatura Disponible';
$this->params['breadcrumbs'][] = ['label' => 'Asignatura Disponibles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="asignatura-disponible-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
