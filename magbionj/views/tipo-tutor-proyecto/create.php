<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TipoTutorProyecto */

$this->title = 'Create Tipo Tutor Proyecto';
$this->params['breadcrumbs'][] = ['label' => 'Tipo Tutor Proyectos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipo-tutor-proyecto-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
