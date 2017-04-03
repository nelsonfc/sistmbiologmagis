<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\AvanceProyecto */

$this->title = 'Create Avance Proyecto';
$this->params['breadcrumbs'][] = ['label' => 'Avance Proyectos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="avance-proyecto-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
