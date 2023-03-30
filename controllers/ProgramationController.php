<?php

namespace app\controllers;

use Yii;
use app\models\Programation;
use app\models\ProgramationSearch;
use app\models\ServicesPersonal;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * ProgramationController implements the CRUD actions for Programation model.
 */
class ProgramationController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'access' => [
                    'class' => AccessControl::className(),
                    'only' => ['logout','index','login'],
                    'rules' => [
                        [
                            'allow' => true,
                            'actions' => ['login', 'signup'],
                            'roles' => ['?'],
                        ],
                        [
                            'actions' => ['logout','index','view','create','update','delete','create-programation'],
                            'allow' => true,
                            'roles' => ['@'],
                        ],
                    ],
                ],
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Programation models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ProgramationSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Programation model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Programation model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Programation();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Programation model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Programation model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        
        return json_encode(['status'=>'ok']);
        // return $this->redirect(['index']);
    }

    /**
     * Finds the Programation model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Programation the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Programation::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionSearchStaffs() {
        
        $out = [];
        
        // print_r($_POST['depdrop_all_params']);exit;
        if (isset($_POST['depdrop_parents'])) {
            $parents = $_POST['depdrop_parents'];
            
            if ($parents != null) {

                $cat_id = $parents[0];
                $out = Programation::getStaffsbyService($cat_id); 

                return \yii\helpers\Json::encode(['output'=>$out]);
            }
        }
        return \yii\helpers\Json::encode(['output'=>'', 'selected'=>'']);
    }


    public function actionCalendarProgramation($start=NULL,$end=NULL,$_=NULL,$idService,$idStaff){

        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $modelServicePersonal = Programation::getIdServicePersonal($idService,$idStaff);
        
        $modelProg = Programation::find()
                                   ->where(['id_services_personal' => $modelServicePersonal['id']])
                                   ->all();
    
        // $times = \app\modules\timetrack\models\Timetable::find()->where(array('category'=>\app\modules\timetrack\models\Timetable::CAT_TIMETRACK))->all();
        $programation = [];

        foreach ($modelProg AS $row){
            $Event = new \yii2fullcalendar\models\Event();
            $Event->id = $row->id;
            $Event->start = $row->date_program;
            if ($row->id_turn == 1) {
                $Event->title = Programation::$turn_m."-\nNro Cupos: ". $row->cupo_limit;
                $Event->color = '#1a5276';
            }else{
                $Event->title = Programation::$turn_t."-\nNro Cupos: ". $row->cupo_limit;
                $Event->color = '#0e6655';
            }
            // $Event->editable = true;
            // $Event->start = date('Y-m-d\TH:i:s\Z',strtotime($row->date_start.' '.$row->time_start));
            // $Event->end = date('Y-m-d\TH:i:s\Z',strtotime($row->date_end.' '.$time->time_end));
            $programation[] = $Event;
        }
    
        return $programation;
    }

    public function actionShowCalendarProgramation(){
        
        
        $data = Yii::$app->request->post();
        $formData = $data['Programation'];
        
        return json_encode([
            'status'=>'ok',
            'viewProgramCalendar'=>$this->renderAjax('calendar/view_programcalendar',
                [
                    'idService' => $formData['service'],
                    'idStaff' => $formData['staff'],
                    'tt' => Programation::$turn_t,
                    'tm' => Programation::$turn_m
                ])
        ]);
    }

    public function actionDataProgramation($id=NULL){
        
        if (!is_null($id)) {
            $modelProg = $this->findModel($id);
            $modelServicePersonal = ServicesPersonal::findOne($modelProg['id_services_personal']);
            $modelProg->staff = $modelServicePersonal['id_staff_med'];
            $modelProg->service = $modelServicePersonal['id_services'];

            return json_encode([
                'status'=>'ok',
                'viewDataProgram'=>$this->renderAjax('calendar/view_formaddprogram',
                    [
                        'model' => $modelProg
                    ])
            ]);
        }else{
            if($this->request->isPost){

                $data = Yii::$app->request->post();
                $modelProg = new Programation();
                $modelServStaff = $modelProg->getIdServicePersonal($data['idService'],$data['idStaff']);
                
                $modelProg->date_program = $data['date'];
                $modelProg->status = Programation::$status_st;
                $modelProg->id_services_personal = $modelServStaff['id'];
                $modelProg->staff = $data['idStaff']; 
                $modelProg->service = $data['idService'];
                
                if ($data['id_turn'] < 2) {
                    $modelProg->id_turn = $data['id_turn'] == 1 ? 0 : 1;
                }else{
                    $modelProg->id_turn = $data['id_turn'];
                }
                
                return json_encode([
                    'status'=>'ok',
                    'viewDataProgram'=>$this->renderAjax('calendar/view_formaddprogram',
                        [
                            'model' => $modelProg
                        ])
                ]);
            }else {
                $this->loadDefaultValues();
            }
        }
    }

    public function actionCreateProgramation($id=NULL,$idStaff=NULL,$idService=NULL){
        
        if(!is_null($id)){

            $modelProg=$this->findModel($id);
            
            if($this->request->isPost){
                
                $data = Yii::$app->request->post();
                $modelProg->setStatusUpdate();
                $modelProg->cupo_limit = (int) $data['Programation']['cupo_limit'];
                $modelProg->update(true,['cupo_limit']);
            
                return json_encode([
                    'status'=>'ok',
                    'viewProgramCalendar'=>$this->renderAjax('calendar/view_programcalendar',
                        [
                            'idService' => $idService,
                            'idStaff' => $idStaff,
                            'tt' => Programation::$turn_t,
                            'tm' => Programation::$turn_m
                        ])
                ]);
            }else {
                $modelProg->loadDefaultValues();
            }

        }else{
            $modelProg = new Programation();

            if ($this->request->isPost) {
                if ($modelProg->load($this->request->post()) && $modelProg->save()) {
                    return json_encode([
                        'status'=>'ok',
                        'viewProgramCalendar'=>$this->renderAjax('calendar/view_programcalendar',
                            [
                                'idService' => $idService,
                                'idStaff' => $idStaff,
                                'tt' => Programation::$turn_t,
                                'tm' => Programation::$turn_m
                            ])
                    ]);
                }else{
                    print_r($modelProg->errors);
                }
            } else {
                $modelProg->loadDefaultValues();
            }
            
        }
        
        
    }
}
