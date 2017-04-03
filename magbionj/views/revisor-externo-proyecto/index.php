<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RevisorExternoProyectoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Revisor Externo Proyectos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="revisor-externo-proyecto-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Revisor Externo Proyecto', ['create'], ['class' => 'btn btn-success']) ?>
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
            // 'revisor_externo_id_revisor',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
