<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RevisorExternoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Revisor Externos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="revisor-externo-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Revisor Externo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_revisor',
            'nombre',
            'procedencia',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
