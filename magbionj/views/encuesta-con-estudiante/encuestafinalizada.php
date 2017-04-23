<?php

use app\models\Encuesta;
use app\models\EncuestaConEstudiante;
use app\models\Estudiante;
use yii\helpers\Html;

$this->title = '';
$title = 'Gracias por participar en el proceso de encuestas';

?>
<div class="encuesta-con-estudiante-create">
    <br>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h1 class="text-center"><?= Html::encode($title) ?></h1>
            <br>
        </div>
        <div class="panel-body container-fluid">
            <div class="row text-center">
                <?php
                $stuen = Estudiante::find()->where(['=', 'id_user', Yii::$app->user->id])->one();
                $id_estudiante = $stuen->id_estudiante;


                if ($stuen->situacion_academica_id_situacion == 1) {


                    if (date('m') <= 6) {
                        $semestreactual = 1;
                    } else {
                        $semestreactual = 2;
                    }
                    $encuestascompletas = EncuestaConEstudiante::find()->where(['=', 'id_estudiante', $id_estudiante])->andWhere(['=', 'estado', 1])->andWhere(['=', 'anio', date('Y')])->andWhere(['=', 'semestre', $semestreactual])->all();

                    $encuestasincompletas = EncuestaConEstudiante::find()->where(['=', 'id_estudiante', $id_estudiante])->andWhere(['=', 'estado', 2])->andWhere(['=', 'anio', date('Y')])->andWhere(['=', 'semestre', $semestreactual])->all();
                    $diferencia = 0;
                    $cont = 1;

                    foreach ($encuestasincompletas as $lista) {


                        if ($cont == 1) {
                            if ($lista->id_encuesta == 2) {
                                $diferencia = 2;
                            }
                            if ($lista->id_encuesta == 1) {
                                $diferencia = 1;
                            }
                        }
                        if ($cont == 2) {

                            $diferencia = 3;
                        }


                        ?>
                        <div class="col-sm-4">
                            <div id="w9" class="panel panel-danger">
                                <div class="panel-heading ">
                                    <div class="pull-right">
                                        <a title="Project Information @GitHub"
                                           href="https://github.com/kartik-v/yii2-label-inplace"
                                           target="_blank">
                                            <i class="glyphicon glyphicon-info-sign"></i>
                                        </a>
                                        <a title="About Extension @YiiFramework"
                                           href="http://www.yiiframework.com/extension/yii2-label-inplace"
                                           target="_blank">
                                            <i class="glyphicon glyphicon-question-sign"></i>
                                        </a>
                                    </div>
                                    <h3><?php $title = Encuesta::findOne($lista->id_encuesta);
                                        echo $title->nombre_encuesta ?></h3>
                                </div>
                                <div class="panel-body">
                                    <p align="justify">A form enhancement widget for Yii framework 2.0 allowing in-field
                                        label
                                        support.
                                        This widget is a wrapper for the
                                        <a href="https://github.com/andreapace/labelinplace" target="_blank">labelinplace
                                            plugin</a>
                                        and
                                        is styled for Bootstrap 3.</p>
                                </div>
                                <div class="panel-footer">
                                    <a class="btn btn-default" title="View details &amp; demo"
                                       href="index.php?r=encuesta-con-estudiante%2Fcompletarencuesta&id=<?php echo $lista->id_encuesta ?>&idece=<?php echo $lista->id_ece ?>&idpaso=1"><i
                                            class="glyphicon glyphicon-zoom-in"></i>&nbsp; Continuar con la encuesta</a>
                                </div>
                            </div>
                        </div>
                        <?php $cont++;
                    } ?>
                    <?php

                    if ($encuestascompletas == null && $encuestasincompletas == null) {

                        $lista = 2;
                        for ($i = 1; $i <= $lista; $i++) {
                            ?>
                            <div class="col-sm-4">
                                <div id="w9" class="panel panel-success">
                                    <div class="panel-heading ">
                                        <div class="pull-right">
                                            <a title="Project Information @GitHub"
                                               href="https://github.com/kartik-v/yii2-label-inplace"
                                               target="_blank">
                                                <i class="glyphicon glyphicon-info-sign"></i>
                                            </a>
                                            <a title="About Extension @YiiFramework"
                                               href="http://www.yiiframework.com/extension/yii2-label-inplace"
                                               target="_blank">
                                                <i class="glyphicon glyphicon-question-sign"></i>
                                            </a>
                                        </div>
                                        <h3><?php $title = Encuesta::findOne($i);
                                            echo $title->nombre_encuesta ?></h3>
                                    </div>
                                    <div class="panel-body">
                                        <p align="justify">Encuesta disponible para completar <br> Periodo <?php
                                            if (date('m') > 6) {

                                                echo date('Y') . " Segundo semestre";
                                            } else {
                                                echo date('Y') . " Primer semestre";
                                            }

                                            ?></p>
                                    </div>
                                    <div class="panel-footer">
                                        <a class="btn btn-default" title="View details &amp; demo"
                                           href="index.php?r=encuesta-con-estudiante%2Fcreate2&idencuesta=<?php echo $i; ?>"><i
                                                class="glyphicon glyphicon-zoom-in"></i>&nbsp; Continuar con la encuesta</a>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    if ($diferencia == 1 && $encuestascompletas == null) {
                        ?>
                        <div class="col-sm-4">
                            <div id="w9" class="panel panel-success">
                                <div class="panel-heading ">
                                    <div class="pull-right">
                                        <a title="Project Information @GitHub"
                                           href="https://github.com/kartik-v/yii2-label-inplace"
                                           target="_blank">
                                            <i class="glyphicon glyphicon-info-sign"></i>
                                        </a>
                                        <a title="About Extension @YiiFramework"
                                           href="http://www.yiiframework.com/extension/yii2-label-inplace"
                                           target="_blank">
                                            <i class="glyphicon glyphicon-question-sign"></i>
                                        </a>
                                    </div>
                                    <h3><?php $title = Encuesta::findOne(2);
                                        echo $title->nombre_encuesta ?></h3>
                                </div>
                                <div class="panel-body">
                                    <p align="justify">A form enhancement widget for Yii framework 2.0 allowing in-field
                                        label
                                        support.
                                        This widget is a wrapper for the
                                        <a href="https://github.com/andreapace/labelinplace" target="_blank">labelinplace
                                            plugin</a>
                                        and
                                        is styled for Bootstrap 3.</p>
                                </div>
                                <div class="panel-footer">
                                    <a class="btn btn-default" title="View details &amp; demo"
                                       href="index.php?r=encuesta-con-estudiante%2Fcreate2&idencuesta=2"><i
                                            class="glyphicon glyphicon-zoom-in"></i>&nbsp; Realizar la encuesta</a>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    if ($diferencia == 2 && $encuestascompletas == null) {

                        ?>
                        <div class="col-sm-4">
                            <div id="w9" class="panel panel-success">
                                <div class="panel-heading ">
                                    <div class="pull-right">
                                        <a title="Project Information @GitHub"
                                           href="https://github.com/kartik-v/yii2-label-inplace"
                                           target="_blank">
                                            <i class="glyphicon glyphicon-info-sign"></i>
                                        </a>
                                        <a title="About Extension @YiiFramework"
                                           href="http://www.yiiframework.com/extension/yii2-label-inplace"
                                           target="_blank">
                                            <i class="glyphicon glyphicon-question-sign"></i>
                                        </a>
                                    </div>
                                    <h3><?php $title = Encuesta::findOne(1);
                                        echo $title->nombre_encuesta ?></h3>
                                </div>
                                <div class="panel-body">
                                    <p align="justify">A form enhancement widget for Yii framework 2.0 allowing in-field
                                        label
                                        support.
                                        This widget is a wrapper for the
                                        <a href="https://github.com/andreapace/labelinplace" target="_blank">labelinplace
                                            plugin</a>
                                        and
                                        is styled for Bootstrap 3.</p>
                                </div>
                                <div class="panel-footer">
                                    <a class="btn btn-default" title="View details &amp; demo"
                                       href="index.php?r=encuesta-con-estudiante%2Fcreate2&idencuesta=1"><i
                                            class="glyphicon glyphicon-zoom-in"></i>&nbsp; Realizar la encuesta</a>
                                </div>
                            </div>
                        </div>
                    <?php }

                    if ($encuestascompletas != null && $encuestasincompletas == null) {

                        $contador = 0;
                        foreach ($encuestascompletas as $listadocompletas) {
                            $contador++;

                        }
                        if ($contador == 1) {

                            if ($listadocompletas->id_encuesta == 1) {
                                ?>
                                <div class="col-sm-4">
                                    <div id="w9" class="panel panel-success">
                                        <div class="panel-heading ">
                                            <div class="pull-right">
                                                <a title="Project Information @GitHub"
                                                   href="https://github.com/kartik-v/yii2-label-inplace"
                                                   target="_blank">
                                                    <i class="glyphicon glyphicon-info-sign"></i>
                                                </a>
                                                <a title="About Extension @YiiFramework"
                                                   href="http://www.yiiframework.com/extension/yii2-label-inplace"
                                                   target="_blank">
                                                    <i class="glyphicon glyphicon-question-sign"></i>
                                                </a>
                                            </div>
                                            <h3><?php $title = Encuesta::findOne(2);
                                                echo $title->nombre_encuesta ?></h3>
                                        </div>
                                        <div class="panel-body">
                                            <p align="justify">Encuesta disponible a su disposición.</p>
                                        </div>
                                        <div class="panel-footer">
                                            <a class="btn btn-default" title="View details &amp; demo"
                                               href="index.php?r=encuesta-con-estudiante%2Fcreate2&idencuesta=2"><i
                                                    class="glyphicon glyphicon-zoom-in"></i>&nbsp; Realizar la encuesta</a>
                                        </div>
                                    </div>
                                </div>
                                <?php ;
                            }
                            if ($listadocompletas->id_encuesta == 2) {
                                ?>
                                <div class="col-sm-4">
                                    <div id="w9" class="panel panel-success">
                                        <div class="panel-heading ">
                                            <div class="pull-right">
                                                <a title="Project Information @GitHub"
                                                   href="https://github.com/kartik-v/yii2-label-inplace"
                                                   target="_blank">
                                                    <i class="glyphicon glyphicon-info-sign"></i>
                                                </a>
                                                <a title="About Extension @YiiFramework"
                                                   href="http://www.yiiframework.com/extension/yii2-label-inplace"
                                                   target="_blank">
                                                    <i class="glyphicon glyphicon-question-sign"></i>
                                                </a>
                                            </div>
                                            <h3><?php $title = Encuesta::findOne(1);
                                                echo $title->nombre_encuesta ?></h3>
                                        </div>
                                        <div class="panel-body">
                                            <p align="justify">Encuesta disponible a su disposición.</p>
                                        </div>
                                        <div class="panel-footer">
                                            <a class="btn btn-default" title="View details &amp; demo"
                                               href="index.php?r=encuesta-con-estudiante%2Fcreate2&idencuesta=1"><i
                                                    class="glyphicon glyphicon-zoom-in"></i>&nbsp; Realizar la encuesta</a>
                                        </div>
                                    </div>
                                </div>
                                <?php

                            }
                        } else {
                            echo "<br><br><br><br><br><br><br><h3>No registra encuestas disponibles ni pendientes para este periodo</h3><br><br><br><br><br><br>";
                        }


                    }
                }else{
                    echo "funciona";
                }
                ?>
            </div>
        </div>
