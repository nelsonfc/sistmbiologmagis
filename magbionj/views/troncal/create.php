<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Troncal */

$this->title = 'Create Troncal';
$this->params['breadcrumbs'][] = ['label' => 'Troncals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="troncal-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
