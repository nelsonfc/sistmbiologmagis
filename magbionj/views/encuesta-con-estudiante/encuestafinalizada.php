<?php

use app\models\Encuesta;
use app\models\EncuestaConEstudiante;
use yii\helpers\Html;

$this->title = '';
$title = 'Gracias por participar en el proceso de encuestas';

?>
<div class="encuesta-con-estudiante-create">
<br>
    <div class="panel panel-primary">
        <div class="panel-heading">
    <h1 class="text-center"><?= Html::encode($title) ?></h1>
    <h3 class="text-center"> Actualmente estas Encuestas están Inconclusas</h3>
            </div>
    <div class="panel-body container-fluid">
    <div class="row">
        <?php $var = EncuestaConEstudiante::find()->where(['=', 'id_estudiante', 1])->andWhere(['=', 'estado', 2])->andWhere(['=', 'anio', date('Y')])->all();
        foreach ($var as $lista) {

            ?>


            <div class="col-sm-4">
                <div id="w9" class="panel panel-success">
                    <div class="panel-heading ">
                        <div class="pull-right">
                            <a title="Project Information @GitHub" href="https://github.com/kartik-v/yii2-label-inplace"
                               target="_blank">
                                <i class="glyphicon glyphicon-info-sign"></i>
                            </a>
                            <a title="About Extension @YiiFramework"
                               href="http://www.yiiframework.com/extension/yii2-label-inplace" target="_blank">
                                <i class="glyphicon glyphicon-question-sign"></i>
                            </a>
                        </div>
                        <h3><i class="glyphicon glyphicon-tag"></i> <?php  $title = Encuesta::findOne($lista->id_encuesta); echo $title->nombre_encuesta   ?></h3>
                    </div>
                    <div class="panel-body">
                        <p align="justify">A form enhancement widget for Yii framework 2.0 allowing in-field label
                            support.
                            This widget is a wrapper for the
                            <a href="https://github.com/andreapace/labelinplace" target="_blank">labelinplace plugin</a>
                            and
                            is styled for Bootstrap 3.</p>
                    </div>
                    <div class="panel-footer">
                        <a class="btn btn-default" title="View details &amp; demo" href="/label-inplace"><i
                                class="glyphicon glyphicon-zoom-in"></i> View …</a>
                    </div>
                </div>
            </div>


        <?php  }  ?>
    </div>
    </div>
    </div></div>