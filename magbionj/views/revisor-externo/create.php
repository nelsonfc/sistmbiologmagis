<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\RevisorExterno */

$this->title = 'Create Revisor Externo';
$this->params['breadcrumbs'][] = ['label' => 'Revisor Externos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="revisor-externo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
