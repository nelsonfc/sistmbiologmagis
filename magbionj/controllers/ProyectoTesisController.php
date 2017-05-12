<?php

namespace app\controllers;

use app\models\Profesor;
use app\models\ProyectoTutor;
use app\models\RevisorExternoProyecto;
use app\models\RevisorProfesorProyecto;
use Yii;
use app\models\ProyectoTesis;
use app\models\ProyectoTesisSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProyectoTesisController implements the CRUD actions for ProyectoTesis model.
 */
class ProyectoTesisController extends Controller
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
     * Lists all ProyectoTesis models.
     * @return mixed
     */
    public function actionIndex($id)
    {
        $searchModel = new ProyectoTesisSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $id);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'id' => $id
        ]);
    }

    /**
     * Displays a single ProyectoTesis model.
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
     * Creates a new ProyectoTesis model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $model = new ProyectoTesis();
        $model2 = new ProyectoTutor();
        $model3 = new ProyectoTutor();
        $model6 = new RevisorExternoProyecto();
        $model4 = new RevisorProfesorProyecto();
        $model5 = new RevisorProfesorProyecto();

        $model->estudiante_id_estudiante = $id;
        $model->estado_tesis_id_estado = 1;
        $model->fecha_rendicion = date("d-m-Y");
        $model->fecha_rendicion = strtotime ( '+4 month' , strtotime ( $model->fecha_rendicion ) ) ;
        $model->fecha_rendicion = date ( 'd-m-Y' , $model->fecha_rendicion );
        if ($model->load(Yii::$app->request->post())) {
            $model->fecha_rendicion = date("Y-m-d", strtotime($model->fecha_rendicion));
            if($model->nota_final >= 50){
                $model->estado_tesis_id_estado  = 2;
            }
            if($model->nota_final < 50 && $model->nota_final != 0){
                $model->estado_tesis_id_estado  = 3;
            }
            if($model->save()) {
                $model2->load(Yii::$app->request->post());
                $model2->fecha = date("Y-m-d");
                $model2->proyecto_tesis_id_proyecto = $model->id_proyecto;
                $model2->profesor_id_profesor = $model2->profesor;
                $model2->tipo_tutor_proyecto_id_tipo = 1;
                $model2->save();
                $model3->load(Yii::$app->request->post());
                $model3->fecha = date("Y-m-d");
                $model3->proyecto_tesis_id_proyecto = $model->id_proyecto;
                $model3->tipo_tutor_proyecto_id_tipo = 2;
                $model3->save();
                $model4->proyecto_tesis_id_proyecto = $model->id_proyecto;
                $model5->proyecto_tesis_id_proyecto = $model->id_proyecto;
                $model6->proyecto_tesis_id_proyecto = $model->id_proyecto;
                $model4->load(Yii::$app->request->post());
                $model4->save();
                $model5->load(Yii::$app->request->post());
                $model5->nota_escrita = $model5->nota_escrita2;
                $model5->nota_final = $model5->nota_final2;
                $model5->nota_oral = $model5->nota_oral2;
                $model5->profesor_id_profesor = $model5->profesor2;
                $model5->save();
                $model6->load(Yii::$app->request->post());
                $model6->save();
                return $this->redirect(['index', 'id' => $id]);
            }else{
                return $this->render('create', [
                    'model' => $model,
                    'model2' => $model2,
                    'model3' => $model3,
                    'model4' => $model4,
                    'model5' => $model5,
                    'model6' => $model6
                ]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
                'model2' => $model2,
                'model3' => $model3,
                'model4' => $model4,
                'model5' => $model5,
                'model6' => $model6
            ]);
        }
    }

    /**
     * Updates an existing ProyectoTesis model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id, $id_est)
    {
        $model = $this->findModel($id);

        //tutor
        $tutores = array_reverse(ProyectoTutor::find()->where(['proyecto_tesis_id_proyecto' => $model->id_proyecto])->andWhere(['tipo_tutor_proyecto_id_tipo' => 1])->all());

        //cotutor
        $co_tutores = array_reverse(ProyectoTutor::find()->where(['proyecto_tesis_id_proyecto' => $model->id_proyecto])->andWhere(['tipo_tutor_proyecto_id_tipo' => 2])->all());

        if(isset($tutores[0])) {
            $model2 = ProyectoTutor::findOne($tutores[0]->id_proyectotutor);
            $antiguo = $model2->profesor_id_profesor;
            $model2->profesor = $model2->profesor_id_profesor;
        }else{
            $model2 = new ProyectoTutor();
            $model2->proyecto_tesis_id_proyecto = $model->id_proyecto;
        }
        if(isset($co_tutores[0])) {
            $model3 = ProyectoTutor::findOne($co_tutores[0]->id_proyectotutor);
            $antiguo_co = $model3->profesor_id_profesor;
        }else{
            $model3 = new ProyectoTutor();
            $model3->proyecto_tesis_id_proyecto = $model->id_proyecto;
        }
        $model->fecha_rendicion = date("d-m-Y", strtotime($model->fecha_rendicion));

        $revisor_profes = RevisorProfesorProyecto::find()->where(['proyecto_tesis_id_proyecto' => $model->id_proyecto])->all();
        $model6 = RevisorExternoProyecto::findOne(['proyecto_tesis_id_proyecto' => $model->id_proyecto]);
        if($model6 == null){
            $model6 = new RevisorExternoProyecto();
            $model6->proyecto_tesis_id_proyecto = $model->id_proyecto;
        }
        if(isset($revisor_profes[0])){
            $model4 = RevisorProfesorProyecto::findOne($revisor_profes[0]->id_revision);
        }else{
            $model4 = new RevisorProfesorProyecto();
            $model4->proyecto_tesis_id_proyecto = $model->id_proyecto;
        }
        if(isset($revisor_profes[0])){
            $model5 = RevisorProfesorProyecto::findOne($revisor_profes[1]->id_revision);
            $model5->nota_escrita2 = $model5->nota_escrita;
            $model5->nota_final2 = $model5->nota_final;
            $model5->nota_oral2 = $model5->nota_oral;
            $model5->profesor2 = $model5->profesor_id_profesor;
        }else{
            $model5 = new RevisorProfesorProyecto();
            $model5->proyecto_tesis_id_proyecto = $model->id_proyecto;
        }

        if ($model->load(Yii::$app->request->post())) {
            $model->fecha_rendicion = date("Y-m-d", strtotime($model->fecha_rendicion));
            if($model->nota_final >= 50){
                $model->estado_tesis_id_estado  = 2;
            }
            if($model->nota_final < 50 && $model->nota_final != 0){
                $model->estado_tesis_id_estado  = 3;
            }
            if($model->save()) {
                $model2->load(Yii::$app->request->post());
                $tutor_nuevo_co = new ProyectoTutor();
                $tutor_nuevo = new ProyectoTutor();
                if ($antiguo != $model2->profesor) {
                    echo "1";
                    $connection = Yii::$app->db;
                    $connection->createCommand()->
                    insert('proyecto_tutor', ['proyecto_tesis_id_proyecto' => $model->id_proyecto,
                        'tipo_tutor_proyecto_id_tipo' => 1,
                        'profesor_id_profesor' => $model2->profesor,
                        'fecha' => date("Y-m-d")
                    ])->execute();
                }
                $model3->load(Yii::$app->request->post());
                if ($antiguo_co != $model3->profesor_id_profesor) {
                    echo "2";
                    $connection = Yii::$app->db;
                    $connection->createCommand()->
                    insert('proyecto_tutor', ['proyecto_tesis_id_proyecto' => $model->id_proyecto,
                        'tipo_tutor_proyecto_id_tipo' => 2,
                        'profesor_id_profesor' => $model3->profesor_id_profesor,
                        'fecha' => date("Y-m-d")
                    ])->execute();
                }
                $model4->load(Yii::$app->request->post());
                $model4->save();
                $model5->load(Yii::$app->request->post());
                $model5->nota_escrita = $model5->nota_escrita2;
                $model5->nota_final = $model5->nota_final2;
                $model5->nota_oral = $model5->nota_oral2;
                $model5->profesor_id_profesor = $model5->profesor2;
                $model5->save();
                $model6->load(Yii::$app->request->post());
                $model6->save();
                return $this->redirect(['index','id' => $id_est]);
            }else{
                return $this->render('update', [
                    'model' => $model,
                    'model2' => $model2,
                    'model3' => $model3,
                    'model4' => $model4,
                    'model5' => $model5,
                    'model6' => $model6
                ]);
            }
        } else {
             return $this->render('update', [
                'model' => $model,
                'model2' => $model2,
                'model3' => $model3,
                 'model4' => $model4,
                 'model5' => $model5,
                 'model6' => $model6
            ]);
        }
    }

    /**
     * Deletes an existing ProyectoTesis model.
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
     * Finds the ProyectoTesis model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ProyectoTesis the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ProyectoTesis::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
