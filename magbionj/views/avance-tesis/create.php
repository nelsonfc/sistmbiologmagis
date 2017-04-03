<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\AvanceTesis */

$this->title = 'Create Avance Tesis';
$this->params['breadcrumbs'][] = ['label' => 'Avance Teses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="avance-tesis-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
