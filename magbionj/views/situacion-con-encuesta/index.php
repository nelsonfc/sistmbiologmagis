<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SituacionConEncuestaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Situacion Con Encuestas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="situacion-con-encuesta-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Situacion Con Encuesta', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_sce',
            'situacion_academica_id_situacion',
            'encuestas_id_encuesta',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
