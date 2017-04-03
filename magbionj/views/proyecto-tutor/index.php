<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProyectoTutorSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Proyecto Tutors';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="proyecto-tutor-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Proyecto Tutor', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_proyectotutor',
            'proyecto_tesis_id_proyecto',
            'tipo_tutor_proyecto_id_tipo',
            'profesor_id_profesor',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
