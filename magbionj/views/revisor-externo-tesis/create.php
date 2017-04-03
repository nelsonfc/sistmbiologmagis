<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\RevisorExternoTesis */

$this->title = 'Create Revisor Externo Tesis';
$this->params['breadcrumbs'][] = ['label' => 'Revisor Externo Teses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="revisor-externo-tesis-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
