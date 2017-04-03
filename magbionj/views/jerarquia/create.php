<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Jerarquia */

$this->title = 'Create Jerarquia';
$this->params['breadcrumbs'][] = ['label' => 'Jerarquias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jerarquia-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
