<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\RevisorExternoProyecto */

$this->title = 'Create Revisor Externo Proyecto';
$this->params['breadcrumbs'][] = ['label' => 'Revisor Externo Proyectos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="revisor-externo-proyecto-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
