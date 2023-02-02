<?php

namespace app\models;
use yii\behaviors\TimestampBehavior;
use yii\behaviors\BlameableBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;
use Yii;

/**
 * This is the model class for table "history_clinic".
 *
 * @property int $id
 * @property int $nro_history_clinic
 * @property string $date_entry
 * @property string|null $addres
 * @property int|null $nro_phone
 * @property string|null $profession
 * @property string|null $ocupation
 * @property string|null $religion
 * @property string|null $procedence
 * @property int $id_type_sure
 * @property int $id_marital_status
 * @property int $id_instruction_grade
 * @property int $id_patient
 * @property int|null $id_patient_comp
 * @property int $created_by
 * @property string $created_date
 * @property int $modified_by
 * @property string $modified_date
 */
class HistoryClinic extends \yii\db\ActiveRecord
{
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created','modified'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => 'modified',
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
        return 'history_clinic';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nro_history_clinic', 'date_entry', 'id_type_sure', 'id_marital_status', 'id_instruction_grade', 'id_patient', 'created_by', 'created_date', 'modified_by', 'modified_date'], 'required'],
            [['nro_history_clinic', 'nro_phone', 'id_type_sure', 'id_marital_status', 'id_instruction_grade', 'id_patient', 'id_patient_comp', 'created_by', 'modified_by'], 'integer'],
            [['date_entry', 'created_date', 'modified_date'], 'safe'],
            [['addres', 'profession', 'ocupation', 'procedence'], 'string', 'max' => 200],
            [['religion'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nro_history_clinic' => 'Nro History Clinic',
            'date_entry' => 'Date Entry',
            'addres' => 'Addres',
            'nro_phone' => 'Nro Phone',
            'profession' => 'Profession',
            'ocupation' => 'Ocupation',
            'religion' => 'Religion',
            'procedence' => 'Procedence',
            'id_type_sure' => 'Id Type Sure',
            'id_marital_status' => 'Id Marital Status',
            'id_instruction_grade' => 'Id Instruction Grade',
            'id_patient' => 'Id Patient',
            'id_patient_comp' => 'Id Patient Comp',
            'created_by' => 'Created By',
            'created_date' => 'Created Date',
            'modified_by' => 'Modified By',
            'modified_date' => 'Modified Date',
        ];
    }
}
