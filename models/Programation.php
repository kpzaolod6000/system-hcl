<?php

namespace app\models;

use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;
use yii\helpers\ArrayHelper;
use yii\db\Query;
use Yii;

/**
 * This is the model class for table "programation".
 *
 * @property int $id
 * @property string|null $date_program
 * @property int $id_services_personal
 * @property int $id_turn
 * @property int $created_by
 * @property string $created_date
 * @property int $modified_by
 * @property string $modified_date
 */
class Programation extends \yii\db\ActiveRecord
{
    public $staff;
    public $service;
    static $status_st = "CREADO";
    static $status_up = "MODIFICADO";
    static $status_en = "FINALIZADO";
    static $status_de = "ELIMINADO";
    static $turn_m = "MAÑANA";
    static $turn_t = "TARDE";

    public function setStatusCreate()
    {
        $this->status = Programation::$status_st;
        $this->update(true, ['status']);
    }

    public function setStatusUpdate()
    {
        $this->status = Programation::$status_up;
        $this->update(true, ['status']);
    }

    public function setStatusEnd()
    {
        $this->status = Programation::$status_en;
        $this->update(true, ['status']);
    }

    public function setStatusDelete()
    {
        $this->status = Programation::$status_de;
        $this->update(true, ['status']);
    }

    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_date', 'modified_date'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => 'modified_date',
                ],
                'value' => new Expression('NOW()'),
            ],
            [
                'class' => BlameableBehavior::className(),
                'createdByAttribute' => 'created_by',
                'updatedByAttribute' => 'modified_by',
            ],
        ];
    }
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'programation';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            //[['date_program', 'created_date', 'modified_date'], 'safe'],
            [['status', 'cupo_limit'], 'required', 'on' => 'update'],
            [['id_services_personal', 'date_program', 'id_turn', 'service', 'staff', 'status', 'cupo_limit'], 'required'],
            [['id_services_personal', 'id_turn', 'service', 'staff', 'cupo_limit'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('programation', 'id'),
            'date_program' => Yii::t('programation', 'date_program'),
            'service' => Yii::t('programation', 'service'),
            'staff' => Yii::t('programation', 'staff'),
            'id_services_personal' => Yii::t('programation', 'id_services_personal'),
            'id_turn' => Yii::t('programation', 'id_turn'),
            'cupo_limit' => Yii::t('programation', 'cupo_limit'),
            //'created_by' => 'Created By',
            //'created_date' => 'Created Date',
            //'modified_by' => 'Modified By',
            //'modified_date' => 'Modified Date',
        ];
    }

    /**
     * Gets query for [[ServicesPersonal]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getServicesPersonal()
    {
        return $this->hasOne(ServicesPersonal::class, ['id' => 'id_services_personal']);
    }

    /**
     * Returns the staff name
     * @param null
     * @return string| StaffMed name
     */
    public function getStaffMedName()
    {
        $staff = StaffMed::find()->where([
            'id' => $this->staff,
        ])->one();
        return $staff['name_staff_med'];
    }

    
    /**
     * Returns the service name
     * @param null
     * @return string| Services name
     */
    public function getServiceName()
    {
        $service = Services::find()->where([
            'id' => $this->service,
        ])->one();
        return $service['name'];
    }


    /**
     * Returns the Services
     * @param null
     * @return ArrayHelper| Services id and name
     */
    public function getAllServices()
    {
        $out = new Query();
        $serviceStaff = $out->select(['s.id as id', 's.name as name'])
            ->from('services s')
            ->join('INNER JOIN', 'services_personal sp', 'sp.id_services = s.id')
            ->orderBy('s.name')
            ->all();

        $data = ArrayHelper::toArray($serviceStaff);
        return ArrayHelper::map($data, 'id', 'name');
    }

    /**
     * Returns the Staff data
     * @param int $cat_id
     * @return object| \yii\db\Query Staff id and name
     */
    public static function getStaffsbyService($cat_id)
    {
        $out = new Query();

        $data = $out->select(['sm.id as id', 'sm.name_staff_med as name'])
            ->from('staff_med sm')
            ->join('INNER JOIN', 'services_personal sp', 'sm.id = sp.id_staff_med')
            ->where(['sp.id_services' => $cat_id])
            ->orderBy('sm.name_staff_med')
            ->all();
        return $data;
    }

    /**
     * Returns the ServicesPersonal data by service and staff
     * @param string $idService, string $idStaff
     * @return object| \yii\db\ActiveQuery 
     */
    public static function getIdServicePersonal($idService, $idStaff)
    {
        return ServicesPersonal::find()->where([
            'id_services' => $idService,
            'id_staff_med' => $idStaff
        ])->one();
    }

    /**
     * Returns the ServicesPersonal data by service
     * @param string $idService
     * @return object| \yii\db\ActiveQuery 
     */
    public static function getIdByServices($idService){
        return ServicesPersonal::find()->where([
            'id_services' => $idService
        ])->all();
    }
}
