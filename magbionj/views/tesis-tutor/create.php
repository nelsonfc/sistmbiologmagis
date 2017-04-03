<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TesisTutor */

$this->title = 'Create Tesis Tutor';
$this->params['breadcrumbs'][] = ['label' => 'Tesis Tutors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tesis-tutor-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
