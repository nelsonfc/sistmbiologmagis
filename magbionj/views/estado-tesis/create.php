<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\EstadoTesis */

$this->title = 'Create Estado Tesis';
$this->params['breadcrumbs'][] = ['label' => 'Estado Teses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estado-tesis-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
