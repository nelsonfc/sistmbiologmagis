<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AsignaturaInscritaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Asignatura Inscritas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="asignatura-inscrita-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Asignatura Inscrita', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_asignatura_inscrita',
            'calificacion',
            'estudiante_id_estudiante',
            'asignatura_disponible_id_asignatura_disponible',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
