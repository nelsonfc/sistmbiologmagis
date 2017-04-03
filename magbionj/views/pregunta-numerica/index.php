<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PreguntaNumericaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pregunta Numericas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pregunta-numerica-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Pregunta Numerica', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_pregunta_numerica',
            'pregunta:ntext',
            'encuestas_id_encuesta',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
