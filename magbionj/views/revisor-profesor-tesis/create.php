<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\RevisorProfesorTesis */

$this->title = 'Create Revisor Profesor Tesis';
$this->params['breadcrumbs'][] = ['label' => 'Revisor Profesor Teses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="revisor-profesor-tesis-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
