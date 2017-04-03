<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PreguntaTextoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pregunta Textos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pregunta-texto-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Pregunta Texto', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_pregunta_texto',
            'pregunta:ntext',
            'respuesta:ntext',
            'encuestas_id_encuesta',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
