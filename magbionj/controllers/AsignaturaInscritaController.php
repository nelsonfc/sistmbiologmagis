<?php

namespace app\controllers;

use Yii;
use app\models\AsignaturaInscrita;
use app\models\AsignaturaInscritaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AsignaturaInscritaController implements the CRUD actions for AsignaturaInscrita model.
 */
class AsignaturaInscritaController extends Controller
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
     * Lists all AsignaturaInscrita models.
     * @return mixed
     */
    public function actionIndex($id)
    {
        $searchModel = new AsignaturaInscritaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $id);
        $asignaturas = AsignaturaInscrita::find()->where(['estudiante_id_estudiante' => $id])->all();
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'id' => $id,
            'a_i' => $asignaturas
        ]);
    }

    /**
     * Displays a single AsignaturaInscrita model.
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
     * Creates a new AsignaturaInscrita model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $model = new AsignaturaInscrita();

        if (Yii::$app->request->isAjax  && $model->load(Yii::$app->request->post())) {
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            $asignaturas = $model->asignatura_disponible_id_asignatura_disponible;
            $guarde = false;
            foreach ($asignaturas as $asignatura){
                if(count(AsignaturaInscrita::find()->where(['estudiante_id_estudiante' => $id])->andWhere(['asignatura_disponible_id_asignatura_disponible' => $asignatura])->all()) == 0) {
                    $asig = new AsignaturaInscrita();
                    $asig->estudiante_id_estudiante = $id;
                    $asig->calificacion = 0;
                    $asig->asignatura_disponible_id_asignatura_disponible = $asignatura;
                    $asig->save();
                    $guarde = true;
                }
            }
            return ['success' => $guarde];
        } else {
            return $this->renderAjax('create', [
                'model' => $model,
                'id' => $id
            ]);
        }
    }

    /**
     * Updates an existing AsignaturaInscrita model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if (Yii::$app->request->isAjax  && $model->load(Yii::$app->request->post())) {
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return ['success' => $model->save()];
        } else {
            return $this->renderAjax('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing AsignaturaInscrita model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionAsignaturas() {
        $anio = $_POST['anio'];
        $semestre = $_POST['semestre'];
        $id  = $_POST['id'];
        $asignaturas_seleccionados = '';
        if(isset($_POST['asignaturas'])){
            $asignaturas_seleccionados = $_POST['asignaturas'];
        }
        $asig_inscritas = \app\models\AsignaturaInscrita::find()->where(['estudiante_id_estudiante' => $id])->all();
        $asignaturas[0] = '';
        $i = 1;
        foreach ($asig_inscritas as $asig){
            $asignaturas[$i] = $asig->asignatura_disponible_id_asignatura_disponible;
            $i++;
        }
        $opciones = \app\models\AsignaturaDisponible::find()->where(['anio' => $anio])->andWhere(['semestre' => $semestre])->all();
        foreach ($opciones as $opcion) {
            $i = 0;
            if($asignaturas_seleccionados != null) {
                foreach ($asignaturas_seleccionados as $id) {
                    if ($opcion->id_asignatura_disponible == $id) {
                        $i++;
                    }
                }
            }
            if ($i == 0) {
                if(!in_array($opcion->id_asignatura_disponible, $asignaturas)) {
                    echo utf8_encode('<option value="' . $opcion->id_asignatura_disponible . '">' . utf8_decode(\app\models\Asignatura::findOne($opcion->asignatura_id_asignatura)->nombre) . '</option>');
                }
            }
        }
    }
    /**
     * Finds the AsignaturaInscrita model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AsignaturaInscrita the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AsignaturaInscrita::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
