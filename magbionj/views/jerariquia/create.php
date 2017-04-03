<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Jerariquia */

$this->title = 'Create Jerariquia';
$this->params['breadcrumbs'][] = ['label' => 'Jerariquias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jerariquia-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
