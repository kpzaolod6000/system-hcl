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
use yii\db\ActiveQuery;



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

    /**
     * Finds medical staff by services
     * If there are data in the Post, returns the list
     * @param null
     * @return Stafflist a list by Services
     */
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

    /**
     * Show the calendar events
     * If the method is by-service-staff, filters by services and staff but
     * If the method is by-service, only filters by services
     * @param string $idService, string $idStaff, string $method
     * @return ProgamationEvents a list of programming events
     */
    public function actionCalendarProgramation($idService,$idStaff = NULL,$method){

        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        
        if ($method=="by-service-staff") {
            $modelServicePersonal = Programation::getIdServicePersonal($idService,$idStaff);
            $modelProg = Programation::find()
                                       ->where(['id_services_personal' => $modelServicePersonal['id']])
                                       ->andWhere(['>=','date_program',date('Y')])
                                       ->all();
        }else{
            $modelProg = Programation::find()
                                       ->joinWith('servicesPersonal')
                                       ->andWhere(['id_services' => $idService])
                                       ->andWhere(['>=','date_program',date('Y')])
                                       ->all();
        }
        // foreach ($modelProg as $model) {
        //     print_r($model->getAttributes());
        //     echo "<br>";
        // }
        // var_dump($modelProg);
        // $times = \app\modules\timetrack\models\Timetable::find()->where(array('category'=>\app\modules\timetrack\models\Timetable::CAT_TIMETRACK))->all();
        $programation = [];

        foreach ($modelProg AS $row){
            $Event = new \yii2fullcalendar\models\Event();
            $Event->id = $row->id;
            $Event->start = $row->date_program;
        
            if ($method == "by-service")
                $nameStaff = $row->servicesPersonal->staffMed['name_staff_med'];
            else
                $nameStaff = "";

            if ($row->id_turn == 1) {
                $Event->title = Programation::$turn_m."-\nNro Cupos: ". $row->cupo_limit."\n" . $nameStaff;
                $Event->color = '#b3f2fc';
            }else{
                $Event->title = Programation::$turn_t."-\nNro Cupos: ". $row->cupo_limit."\n" . $nameStaff;
                $Event->color = '#dbf1b8';
            }
            // $Event->editable = true;
            // $Event->start = date('Y-m-d\TH:i:s\Z',strtotime($row->date_start.' '.$row->time_start));
            // $Event->end = date('Y-m-d\TH:i:s\Z',strtotime($row->date_end.' '.$time->time_end));
            $programation[] = $Event;
        }
        return $programation;
    }

    /**
     * Will display the view "view_program_by_service_staff" or "view_program_by_service_staff" depending on the method
     * @param string $method,
     * @return string|\yii\web\Response a calendar view
     */
    public function actionShowCalendarProgramation($method){
        
        
        $data = Yii::$app->request->post();

        $formData = $data['Programation'];
        if ($method == "by-service-staff" ) {
            return json_encode([
                'status'=>'ok',
                'viewProgramCalendar'=>$this->renderAjax('calendar/view_program_by_service_staff',
                    [
                        'idService' => $formData['service'],
                        'idStaff' => $formData['staff'],
                        'tt' => Programation::$turn_t,
                        'tm' => Programation::$turn_m,
                        'method' => $method
                    ])
            ]);    
        }else if ($method == "by-service"){

            return json_encode([
                'status'=>'ok',
                'viewProgramCalendar'=>$this->renderAjax('calendar/view_program_by_service',
                    [
                        'idService' => $formData['service'],
                        'tt' => Programation::$turn_t,
                        'tm' => Programation::$turn_m,
                        'method' => $method
                    ])
            ]);
        }else {
            return json_encode([
                'status'=>'fail',
                'msg'=> 'Error inesperado'
            ]);
        }
        
    }

    /**
     * Display modal according to the creation or update of the programming event
     * If $id is successful, the browser will be renders the view "view_form_add_program" to update the event form.
     * If $id is unsuccessful ,the browser will be renders the view "view_form_add_program" to create a new event form.
     * @param int $id ID
     * @return string|\yii\web\Response
     */
    public function actionDisplayModalProgramation($id=NULL,$method){
        
        if (!is_null($id)) {
            $modelProg = $this->findModel($id);
            $modelServicePersonal = ServicesPersonal::findOne($modelProg['id_services_personal']);
            $modelProg->staff = $modelServicePersonal['id_staff_med'];
            $modelProg->service = $modelServicePersonal['id_services'];

            return json_encode([
                'status'=>'ok',
                'viewDataProgram'=>$this->renderAjax('calendar/view_form_add_program',
                    [
                        'model' => $modelProg,
                        'method' => $method
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
                    'viewDataProgram'=>$this->renderAjax('calendar/view_form_add_program',
                        [
                            'model' => $modelProg,
                            'method' => $method
                        ])
                ]);
            }else {
                $this->loadDefaultValues();
            }
        }
    }

     /**
     * Save or Update a programation event.
     * If $id is successful, update the event and it will be renders the view "view_form_add_program".
     * If $id is unsuccessful,save the event and will be renders the view "view_form_add_program".
     * @param int $id ID, string $idService, string $idStaff, string $method
     * @return string|\yii\web\Response depending to the method
     */
    public function actionCreateProgramation($id=NULL,$idService=NULL,$idStaff=NULL,$method){
        
        if(!is_null($id)){

            $modelProg=$this->findModel($id);
            
            if($this->request->isPost){
                
                $data = Yii::$app->request->post();
                $modelProg->setStatusUpdate();
                $modelProg->cupo_limit = (int) $data['Programation']['cupo_limit'];
                $modelProg->update(true,['cupo_limit']);
                
                if ($method == 'by-service-staff') {
                    return json_encode([
                        'status'=>'ok',
                        'viewProgramCalendar'=>$this->renderAjax('calendar/view_program_by_service_staff',
                            [
                                'idService' => $idService,
                                'idStaff' => $idStaff,
                                'tt' => Programation::$turn_t,
                                'tm' => Programation::$turn_m,
                                'method' => $method
                            ])
                    ]);
                }else {
                    return json_encode([
                        'status'=>'ok',
                        'viewProgramCalendar'=>$this->renderAjax('calendar/view_program_by_service',
                            [
                                'idService' => $idService,
                                'idStaff' => $idStaff,
                                'tt' => Programation::$turn_t,
                                'tm' => Programation::$turn_m,
                                'method' => $method
                            ])
                    ]);
                }
               
            }else {
                $modelProg->loadDefaultValues();
            }

        }else{
            $modelProg = new Programation();

            if ($this->request->isPost) {
                if ($modelProg->load($this->request->post()) && $modelProg->save()) {
                    return json_encode([
                        'status'=>'ok',
                        'viewProgramCalendar'=>$this->renderAjax('calendar/view_program_by_service_staff',
                            [
                                'idService' => $idService,
                                'idStaff' => $idStaff,
                                'tt' => Programation::$turn_t,
                                'tm' => Programation::$turn_m,
                                'method' => $method
                            ])
                    ]);
                }else{
                    print_r($modelProg->errors);
                }
            } else {
                $modelProg->loadDefaultValues();
            }
            
        }
        return json_encode([
            'status'=>'fail',
            'msg' => 'Error inesperado'
        ]);
    }
}
