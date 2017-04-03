<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\RevisorProfesorProyecto */

$this->title = 'Create Revisor Profesor Proyecto';
$this->params['breadcrumbs'][] = ['label' => 'Revisor Profesor Proyectos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="revisor-profesor-proyecto-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
