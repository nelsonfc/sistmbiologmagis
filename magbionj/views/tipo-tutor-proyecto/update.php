<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TipoTutorProyecto */

$this->title = 'Update Tipo Tutor Proyecto: ' . $model->id_tipo;
$this->params['breadcrumbs'][] = ['label' => 'Tipo Tutor Proyectos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_tipo, 'url' => ['view', 'id' => $model->id_tipo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tipo-tutor-proyecto-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
