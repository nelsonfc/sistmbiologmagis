<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RevisorProfesorProyectoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Revisor Profesor Proyectos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="revisor-profesor-proyecto-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Revisor Profesor Proyecto', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_revision',
            'nota_oral',
            'nota_escrita',
            'nota_final',
            'proyecto_tesis_id_proyecto',
            // 'profesor_id_profesor',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
