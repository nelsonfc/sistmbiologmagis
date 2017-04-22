<?php

namespace app\controllers;

use app\models\PreguntaNumerica;
use app\models\RespuestaNumerica;
use app\models\RespuestaTexto;
use Codeception\Module\Yii2;
use Yii;
use app\models\EncuestaConEstudiante;
use app\models\EncuestaConEstudianteSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\base\Model;


/**
 * EncuestaConEstudianteController implements the CRUD actions for EncuestaConEstudiante model.
 */
class EncuestaConEstudianteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all EncuestaConEstudiante models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EncuestaConEstudianteSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single EncuestaConEstudiante model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new EncuestaConEstudiante model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new EncuestaConEstudiante();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_ece]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    public function actionEncuestafinalizada()
    {


        return $this->render('encuestafinalizada');

    }

    public function actionCreate2()
    {
        $model = new EncuestaConEstudiante();


        if ($model->load(Yii::$app->request->post())) {

            $model->fecha_completado = date('Y-m-d');
            $model->anio = date('Y');
            if (date('m') > 6) {
                $model->semestre = 2;
            } else {
                $model->semestre = 1;
            }
            $model->id_estudiante = 1;
            $model->estado = 2;


            if ($model->save()) {
                return $this->redirect(['completarencuesta', 'id' => $model->id_encuesta, 'idece' => $model->id_ece, 'idpaso' => 1]);
            }
        } else {
            return $this->render('create2', [
                'model' => $model,
            ]);
        }
    }


    public function actionCompletarencuesta($id, $idece, $idpaso)
    {
        if ($this->findModel($idece)->estado != 1) {
            $model2 = new RespuestaNumerica();
            $model = [new RespuestaNumerica];
            $model3 = new RespuestaTexto();
            if (null != RespuestaNumerica::find()->where(['=', 'id_ece', $idece])->andWhere(['=', 'id_preguntanumerica', 37])->all() && $idpaso == 1) {
                $idpaso += 1;
                return $this->redirect(['completarencuesta', 'id' => $id, 'idece' => $idece, 'idpaso' => $idpaso]);

            }
            if (null != RespuestaNumerica::find()->where(['=', 'id_ece', $idece])->andWhere(['=', 'id_preguntanumerica', 44])->all() && $idpaso == 2) {
                $idpaso += 1;
                return $this->redirect(['completarencuesta', 'id' => $id, 'idece' => $idece, 'idpaso' => $idpaso]);

            }
            if (null != RespuestaNumerica::find()->where(['=', 'id_ece', $idece])->andWhere(['=', 'id_preguntanumerica', 50])->all() && $idpaso == 3) {
                $idpaso += 1;
                return $this->redirect(['completarencuesta', 'id' => $id, 'idece' => $idece, 'idpaso' => $idpaso]);

            }
            if(null != RespuestaNumerica::find()->where(['=','id_ece',$idece])->andWhere(['=','id_preguntanumerica',54])->all()&&$idpaso==4){
                $idpaso+=1;
                return $this->redirect(['completarencuesta', 'id' => $id, 'idece' => $idece, 'idpaso' => $idpaso]);

            }
            if(null != RespuestaNumerica::find()->where(['=','id_ece',$idece])->andWhere(['=','id_preguntanumerica',57])->all()&&$idpaso==5){
                $idpaso+=1;
                return $this->redirect(['completarencuesta', 'id' => $id, 'idece' => $idece, 'idpaso' => $idpaso]);

            }
            if(null != RespuestaNumerica::find()->where(['=','id_ece',$idece])->andWhere(['=','id_preguntanumerica',58])->all()&&$idpaso==6){
                $idpaso+=1;
                return $this->redirect(['completarencuesta', 'id' => $id, 'idece' => $idece, 'idpaso' => $idpaso]);

            }
            if ($idpaso == 7) {

                if ($model3->load(Yii::$app->request->post())) {
                    $model3->id_encuesta_con_estudiante = $idece;
                    $model3->id_pregunta_texto = 14;
                    if ($model3->save()) {
                        $model4 = $this->findModel($idece);

                        $model4->estado = 1;
                        $model4->save();

                        return $this->redirect(['index']);


                    } else {
                        return $this->render('completarencuesta', [
                            'model' => $model,
                            'content' => $this->renderPartial('encuestatemauno', ['model' => $model, 'model3' => $model3, 'model2' => $model2, 'id' => $id, 'idece' => $idece, 'idpaso' => $idpaso]),

                        ]);
                    }
                }
                return $this->render('completarencuesta', [
                    'model' => $model,
                    'content' => $this->renderPartial('encuestatemauno', ['model' => $model, 'model3' => $model3, 'model2' => $model2, 'id' => $id, 'idece' => $idece, 'idpaso' => $idpaso]),

                ]);

            } else {
                if (Model::loadMultiple($model, Yii::$app->request->post())) {
                    $model = Model::createMultiple(RespuestaNumerica::classname());
                    Model::loadMultiple($model, Yii::$app->request->post());
                    $valid = true;
                    if ($valid) {
                        $transaction = \Yii::$app->db->beginTransaction();
                        try {
                            foreach ($model as $modelAddress) {
                                $modelo = new RespuestaNumerica();
                                $modelo->valor_respuesta = $modelAddress->valor_respuesta;
                                $modelo->id_ece = $idece;
                                $modelo->id_preguntanumerica = $modelAddress->id_preguntanumerica;
                                if (!($flag = $modelo->save(false))) {
                                    $transaction->rollBack();
                                    break;
                                }
                            }

                            if ($flag) {
                                $transaction->commit();
                                $idpaso += 1;
                                return $this->redirect(['completarencuesta', 'id' => $id, 'idece' => $idece, 'idpaso' => $idpaso]);
                            }
                        } catch (Exception $e) {
                            $transaction->rollBack();
                        }

                    }
                } else {
                    return $this->render('completarencuesta', [
                        'model' => $model,
                        'content' => $this->renderPartial('encuestatemauno', ['model' => $model, 'model3' => $model3, 'model2' => $model2, 'id' => $id, 'idece' => $idece, 'idpaso' => $idpaso]),

                    ]);
                }
            }
        }
    }

    public function actionEncuestatemauno($id, $idece)
    {

        $model = [new RespuestaNumerica];
        $model2 = new RespuestaNumerica();
        if (Model::loadMultiple($model, Yii::$app->request->post())) {
            $model = Model::createMultiple(RespuestaNumerica::classname());
            Model::loadMultiple($model, Yii::$app->request->post());
            $valid = true;
            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    foreach ($model as $modelAddress) {
                        $modelo = new RespuestaNumerica();
                        $modelo->valor_respuesta = $modelAddress->valor_respuesta;
                        $modelo->id_ece = $idece;
                        $modelo->id_preguntanumerica = $modelAddress->id_preguntanumerica;
                        if (!($flag = $modelo->save(false))) {
                            $transaction->rollBack();
                            break;
                        }
                    }

                    if ($flag) {
                        $transaction->commit();

                        return $this->redirect(['index']);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            } else {
            }
        } else {
            return $this->render('encuestatemauno', [
                'model' => (empty($model)) ? [new Respuestanumerica] : $model,
                'model2' => $model2,
                'idece' => $idece
            ]);
        }

    }


    /**
     * Updates an existing EncuestaConEstudiante model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_ece]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing EncuestaConEstudiante model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the EncuestaConEstudiante model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return EncuestaConEstudiante the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = EncuestaConEstudiante::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
