<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Encuestas */

$this->title = 'Create Encuestas';
$this->params['breadcrumbs'][] = ['label' => 'Encuestas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="encuestas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
